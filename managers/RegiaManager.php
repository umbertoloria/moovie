<?php

/**
 * Regia è un'associazione tra un Film e un Artista.
 * Ogni artista può curare la regia di più film. La regia di ogni film deve essere curata da almeno un artista.
 *
 * RegiaManager permette di conoscere:
 * * in quali film un artista ha partecipato alla regia
 * * quali artisti hanno curato la regia di un film.
 *
 * @see    Film, IFilmDAO, Artista, IArtistaDAO
 * @author Umberto Loria
 */
class RegiaManager {

	/**
	 * Dato un ArtistaID, restituisce i FilmID le cui regie sono state curate anche dall'artista.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_films_from_artista(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film FROM regie WHERE regista = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = intval($r["film"]);
		return $res;
	}

	/**
	 * Dato un FilmID, restituisce gli ArtistiID che hanno curato la sua regia.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_artisti_from_film(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT regista FROM regie WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = intval($r["regista"]);
		return $res;
	}

	public static function set_only(int $film_id, array $registi_id): bool {
		// Non devono esserci doppioni
		$doppioni_cache = [];
		foreach ($registi_id as $regista_id) {
			if (isset($doppioni_cache[$regista_id]))
				return false;
			$doppioni_cache[$regista_id] = true;
		}
		unset($doppioni_cache);
		DB::beginTransaction();
		// Le chiavi di questa cache conterranno tutti i registi inseriti/lasciati dopo il foreach che segue
		$regista_inserito_cache = [];
		foreach ($registi_id as $regista_id) {
			// Controlla se <regista_id> è già presente
			$stmt = DB::stmt("SELECT * FROM regie WHERE film = ? AND regista = ?");
			if (!$stmt->execute([$film_id, $regista_id])) {
				DB::rollbackTransaction();
				return false;
			}
			if ($stmt->rowCount() === 0) {
				// Se non c'era, lo inserisco
				$stmt = DB::stmt("INSERT INTO regie SET film = ?, regista = ?");
				if (!$stmt->execute([$film_id, $regista_id]) or $stmt->rowCount() !== 1) {
					DB::rollbackTransaction();
					return false;
				}
			}
			$regista_inserito_cache[$regista_id] = true;
		}
		// Tra tutti i registi presenti in questo momento, dobbiamo rimuovere quelli non inseriti/lasciati
		$stmt = DB::stmt("SELECT regista FROM regie WHERE film = ?");
		if (!$stmt->execute([$film_id])) {
			DB::rollbackTransaction();
			return false;
		}
		while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if (!isset($regista_inserito_cache[$r["regista"]])) {
				// Questo regista è un refuso: non è stato inserito/lasciato nel foreach precedente, e va eliminato
				$rem = DB::stmt("DELETE FROM regie WHERE film = ? AND regista = ?");
				if (!$rem->execute([$film_id, $r["regista"]]) or $rem->rowCount() !== 1) {
					DB::rollbackTransaction();
					return false;
				}
			}
		}
		DB::commitTransaction();
		return true;
	}

}