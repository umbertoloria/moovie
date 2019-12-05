<?php

class FilmGuardatiManager {

	// AGGIUNTE

	/** @return FilmGuardato[] */
	public static function get(int $id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente, film, voto, timestamp
			FROM film_guardati WHERE utente = ?
			ORDER BY timestamp DESC");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new FilmGuardato($r["utente"], $r["film"], $r["voto"], $r["timestamp"]);
		return $res;
	}

}