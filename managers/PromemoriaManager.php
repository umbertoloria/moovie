<?php

class PromemoriaManager {

	// AGGIUNTE

	/** @return Promemoria[] */
	public static function get_from_utente(int $utente_id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente, film, timestamp
			FROM promemoria WHERE utente = ?
			ORDER BY timestamp DESC");
		if ($stmt->execute([$utente_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Promemoria($r["utente"], $r["film"], $r["timestamp"]);
		return $res;
	}

	public static function exists(int $utente_id, int $film_id): bool {
		$stmt = DB::stmt("SELECT utente FROM promemoria WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente_id, $film_id]) and $stmt->rowCount() === 1;
	}

	public static function create(Promemoria $promemoria): bool {
		$stmt = DB::stmt("INSERT INTO promemoria (utente, film) VALUES (?, ?)");
		return $stmt->execute([$promemoria->getUtente(), $promemoria->getFilm()]);
	}

	public static function delete(Promemoria $promemoria): bool {
		$stmt = DB::stmt("DELETE FROM promemoria WHERE utente = ? AND film = ?");
		return $stmt->execute([$promemoria->getUtente(), $promemoria->getFilm()]) and $stmt->rowCount() === 1;
	}

	public static function get_from_utente_and_film(int $utente_id, int $film_id): ?Promemoria {
		$stmt = DB::stmt("SELECT utente, film, timestamp FROM promemoria WHERE utente = ? AND film = ?");
		if ($stmt->execute([$utente_id, $film_id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Promemoria($r["utente"], $r["film"], $r["timestamp"]);
		else
			return null;
	}

}