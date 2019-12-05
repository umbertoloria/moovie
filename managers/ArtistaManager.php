<?php

class ArtistaManager {

	// AGGIUNTE

	public static function doRetrieveByID(int $id): ?Artista {
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

}