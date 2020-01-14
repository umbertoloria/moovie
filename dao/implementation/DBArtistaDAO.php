<?php

class DBArtistaDAO implements IArtistaDAO {

	public function get_from_id(int $id): ?Artista {
		$stmt = DB::stmt("
				SELECT id, nome, nascita, descrizione
				FROM artisti
				JOIN artisti_descrizioni
					ON artisti.id = artisti_descrizioni.artista
				WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Artista($r["id"], $r["nome"], $r["nascita"], $r["descrizione"]);
		else
			return null;
	}

	public function downloadFaccia(int $id) {
		$stmt = DB::stmt("SELECT faccia FROM artisti_facce WHERE artista = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return $r["faccia"];
		else
			return null;
	}

	public function uploadFaccia(int $id, $faccia_bin): bool {
		$stmt = DB::stmt("UPDATE artisti_facce SET faccia = ? WHERE artista = ?");
		return $stmt->execute([$faccia_bin, $id]) and $stmt->rowCount() === 1;
	}

	/** @return Artista[] */
	public function search(string $fulltext): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome, nascita, descrizione
				FROM artisti JOIN artisti_descrizioni
					ON artisti.id = artisti_descrizioni.artista
				WHERE MATCH(nome) AGAINST(? IN NATURAL LANGUAGE MODE)
					OR MATCH(descrizione) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Artista($r["id"], $r["nome"], $r["nascita"], $r["descrizione"]);
		return $res;
	}

	public function create(Artista $artista, $faccia_bin): ?Artista {
		DB::beginTransaction();
		$stmt1 = DB::stmt("INSERT INTO artisti (nome, nascita) VALUES (?, ?)");
		if (!$stmt1->execute([$artista->getNome(), $artista->getNascita()])) {
			DB::rollbackTransaction();
			return null;
		}
		$artista_id = DB::lastInsertedID();
		$stmt2 = DB::stmt("INSERT INTO artisti_descrizioni (artista, descrizione) VALUES (?, ?)");
		if (!$stmt2->execute([$artista_id, $artista->getDescrizione()])) {
			DB::rollbackTransaction();
			return null;
		}
		$stmt3 = DB::stmt("INSERT INTO artisti_facce (artista, faccia) VALUES (?, ?)");
		if (!$stmt3->execute([$artista_id, $faccia_bin])) {
			DB::rollbackTransaction();
			return null;
		}
		DB::commitTransaction();
		return self::get_from_id($artista_id);
	}

	/** @return Artista[] */
	public function get_all(): array {
		$res = [];
		$stmt = DB::stmt("
				SELECT id, nome, nascita, descrizione
				FROM artisti
				JOIN artisti_descrizioni
					ON artisti.id = artisti_descrizioni.artista
				ORDER BY nome, nascita");
		if ($stmt->execute([]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Artista($r["id"], $r["nome"], $r["nascita"], $r["descrizione"]);
		return $res;
	}

	public function update(Artista $artista): ?Artista {

		$artista_reale = self::get_from_id($artista->getID());
		if (!$artista_reale)
			return null;

		$same_nome = $artista_reale->getNome() === $artista->getNome();
		$same_nascita = $artista_reale->getNascita() === $artista->getNascita();
		$same_descrizione = $artista_reale->getDescrizione() === $artista->getDescrizione();

		if ($same_nome and $same_nascita and $same_descrizione)
			return $artista;

		DB::beginTransaction();

		if (!$same_nome) {
			$stmt_nome = DB::stmt("UPDATE artisti SET nome = ? WHERE id = ?");
			if (
				!$stmt_nome->execute([$artista->getNome(), $artista->getID()])
				or $stmt_nome->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_nascita) {
			$stmt_nascita = DB::stmt("UPDATE artisti SET nascita = ? WHERE id = ?");
			if (
				!$stmt_nascita->execute([$artista->getNascita(), $artista->getID()])
				or $stmt_nascita->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_descrizione) {
			$stmt_descrizione = DB::stmt("UPDATE artisti_descrizioni SET descrizione = ? WHERE artista = ?");
			if (
				!$stmt_descrizione->execute([$artista->getDescrizione(), $artista->getID()])
				or $stmt_descrizione->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		DB::commitTransaction();
		return self::get_from_id($artista->getID());
	}

	public function delete(int $id): bool {
		$stmt = DB::stmt("DELETE FROM artisti WHERE id = ?");
		return $stmt->execute([$id]) and $stmt->rowCount() === 1;
	}

}