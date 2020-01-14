<?php

class DBRecitazioneDAO implements IRecitazioneDAO {

	/** @inheritDoc */
	public function get_from_artista(int $artista_id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film, attore, personaggio FROM recitazioni WHERE attore = ?");
		if ($stmt->execute([$artista_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Recitazione($r["film"], $r["attore"], $r["personaggio"]);
		return $res;
	}

	/** @inheritDoc */
	public function get_from_film(int $film_id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film, attore, personaggio FROM recitazioni WHERE film = ?");
		if ($stmt->execute([$film_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Recitazione($r["film"], $r["attore"], $r["personaggio"]);
		return $res;
	}

	/** @inheritDoc */
	public function set_only(int $film_id, array $recitazioni): bool {
		// Le recitazioni devono avere sempre lo stesso <film> ma mai lo stesso <attore>
		$unique_cache = [];
		foreach ($recitazioni as $recitazione) {
			if ($recitazione->getFilm() !== $film_id)
				return false;
			if (isset($unique_cache[$recitazione->getAttore()]))
				return false;
			$unique_cache[$recitazione->getAttore()] = true;
		}
		unset($unique_cache);
		DB::beginTransaction();
		// Le chiavi di questa cache conterranno tutti gli attori inseriti/aggiornati/lasciati dopo foreach che segue
		$attore_inserito_cache = [];
		foreach ($recitazioni as $recitazione) {
			// Verifica se esiste una recitazione simile per (film_id, attore_id)
			$stmt = DB::stmt("SELECT personaggio FROM recitazioni WHERE film = ? AND attore = ?");
			if (!$stmt->execute([$recitazione->getFilm(), $recitazione->getAttore()])) {
				DB::rollbackTransaction();
				return false;
			}
			if ($stmt->rowCount() === 0) {
				// Se non c'è una recitazione simile, allora la aggiungo
				$stmt = DB::stmt("INSERT INTO recitazioni SET film = ?, attore = ?, personaggio = ?");
				if (!$stmt->execute(
						[$recitazione->getFilm(), $recitazione->getAttore(), $recitazione->getPersonaggio()]
					) or $stmt->rowCount() !== 1) {
					DB::rollbackTransaction();
					return false;
				}
			} elseif ($stmt->fetch(PDO::FETCH_ASSOC)["personaggio"] !== $recitazione->getPersonaggio()) {
				// Se c'è una recitazione simile ma il nome del personaggio è diverso, lo aggiorno
				$stmt = DB::stmt("UPDATE recitazioni SET personaggio = ? WHERE film = ? AND attore = ?");
				if (!$stmt->execute([$recitazione->getPersonaggio(), $recitazione->getFilm(), $recitazione->getAttore()])
					or $stmt->rowCount() !== 1) {
					DB::rollbackTransaction();
					return false;
				}
			}
			$attore_inserito_cache[$recitazione->getAttore()] = true;
		}
		// Ho inserito tutte le recitazione desiderate, e ora prelevo tutte quelle rimaste (che sono indesiderate)
		// Tra tutte le recitazioni presenti, dobbiamo rimuovere quelle non inserite/aggiornate/lasciate
		$stmt = DB::stmt("SELECT attore FROM recitazioni WHERE film = ?");
		if (!$stmt->execute([$film_id])) {
			DB::rollbackTransaction();
			return false;
		}
		while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if (!isset($attore_inserito_cache[$r["attore"]])) {
				// Questo attore va eliminato: non è stato inserito/aggiornato/lasciato nel foreach precedente
				$stmt_rem = DB::stmt("DELETE FROM recitazioni WHERE film = ? AND attore = ?");
				if (!$stmt_rem->execute([$film_id, $r["attore"]]) or $stmt_rem->rowCount() !== 1) {
					DB::rollbackTransaction();
					return false;
				}
			}
		}
		DB::commitTransaction();
		return true;
	}

}