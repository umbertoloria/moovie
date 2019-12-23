<?php

class PromemoriaManager {

	// AGGIUNTE

	/** @return Promemoria[] */
	public static function get(int $utente): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente, film, timestamp
			FROM promemoria WHERE utente = ?
			ORDER BY timestamp DESC");
		if ($stmt->execute([$utente]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Promemoria($r["utente"], $r["film"], $r["timestamp"]);
		return $res;
	}

	public static function exists(int $utente, int $film): bool {
		$stmt = DB::stmt("SELECT utente FROM promemoria WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() === 1;
	}

	public static function create(Promemoria $promemoria): bool {
		$stmt = DB::stmt("INSERT INTO promemoria (utente, film) VALUES (?, ?)");
		return $stmt->execute([$promemoria->getUtente(), $promemoria->getFilm()]);
	}

	public static function drop(int $utente, int $film): bool {
		$stmt = DB::stmt("DELETE FROM promemoria WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() === 1;
	}

}