<?php

class FilmManager {

	// AGGIUNTE

	public static function doRetrieveByID(int $id) {
		$stmt = DB::stmt(
			"SELECT id, titolo, durata, anno, descrizione
				FROM films
					JOIN films_descrizioni
						ON films.id = films_descrizioni.film
				WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Film($r["id"], $r["titolo"], $r["durata"], $r["anno"], $r["descrizione"]);
		else
			return null;
	}

	public static function downloadCopertina(int $id) {
		$stmt = DB::stmt("SELECT copertina FROM films_copertine WHERE film = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return $r["copertina"];
		else
			return null;
	}

	public static function search(string $fulltext) {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, titolo, durata, anno, descrizione
				FROM films JOIN films_descrizioni
					ON films.id = films_descrizioni.film
				WHERE MATCH(titolo) AGAINST(? IN NATURAL LANGUAGE MODE)
					OR MATCH(descrizione) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Film($r["id"], $r["titolo"], $r["durata"], $r["anno"], $r["descrizione"]);
		return $res;
	}

}