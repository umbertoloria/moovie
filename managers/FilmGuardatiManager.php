<?php

class FilmGuardatiManager {

	public static function add(int $utente, int $film, float $voto): bool {
		$stmt = DB::stmt("INSERT INTO film_guardati (utente, film, voto) VALUES (?, ?, ?)");
		return $stmt->execute([$utente, $film, $voto]);
	}

	public static function edit(int $utente, int $film, float $voto): bool {
		$stmt = DB::stmt("UPDATE film_guardati SET voto = ?, timestamp = DEFAULT WHERE utente = ? AND film = ?");
		return $stmt->execute([$voto, $utente, $film]) and $stmt->rowCount() === 1;
	}

	public static function drop(int $utente, int $film): bool {
		$stmt = DB::stmt("DELETE FROM film_guardati WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() === 1;
	}

	// AGGIUNTE

	/** @return FilmGuardato[] */
	public static function getAllOf(int $id): array {
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

	public static function doRetrieveByUtenteAndFilm(int $utente, int $film): ?FilmGuardato {
		$stmt = DB::stmt("SELECT utente, film, voto, timestamp FROM film_guardati WHERE utente = ? AND film = ?");
		if ($stmt->execute([$utente, $film]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new FilmGuardato($r["utente"], $r["film"], $r["voto"], $r["timestamp"]);
		else
			return null;
	}

	public static function exists(int $utente, int $film): bool {
		$stmt = DB::stmt("SELECT utente FROM film_guardati WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() == 1;
	}

}