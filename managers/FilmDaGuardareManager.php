<?php

class FilmDaGuardareManager {

	// AGGIUNTE

	/** @return FilmDaGuardare[] */
	public static function get(int $id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente, film, timestamp
			FROM film_da_guardare WHERE utente = ?
			ORDER BY timestamp DESC");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new FilmDaGuardare($r["utente"], $r["film"], $r["timestamp"]);
		return $res;
	}

    /** @return Boolean */
    public static function add(int $utente, int $film) {
        $stmt = DB::stmt("INSERT INTO film_da_guardare (utente, film) VALUES (? ,?)");
        if ($stmt->execute([$utente, $film]))
            return true;
        else
            return false;
    }

}