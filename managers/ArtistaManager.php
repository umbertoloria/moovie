<?php

class ArtistaManager {

	// AGGIUNTE

	public static function get_from_id(int $id): ?Artista {
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

	public static function downloadFaccia(int $id) {
		$stmt = DB::stmt("SELECT faccia FROM artisti_facce WHERE artista = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return $r["faccia"];
		else
			return null;
	}

	/** @return Artista[] */
	public static function search(string $fulltext): array {
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

	public static function create(Artista $artista, $faccia_bin): ?Artista {
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

}