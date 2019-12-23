<?php

class GiudizioManager {

	public static function create(Giudizio $giudizio): bool {
		$stmt = DB::stmt("INSERT INTO giudizi (utente, film, voto) VALUES (?, ?, ?)");
		return $stmt->execute([$giudizio->getUtente(), $giudizio->getFilm(), $giudizio->getVoto()]);
	}

	public static function update(Giudizio $giudizio): bool {
		$stmt = DB::stmt("UPDATE giudizi SET voto = ?, timestamp = DEFAULT WHERE utente = ? AND film = ?");
		return $stmt->execute([$giudizio->getVoto(), $giudizio->getUtente(), $giudizio->getFilm()])
			and $stmt->rowCount() === 1;
	}

	public static function drop(int $utente, int $film): bool {
		$stmt = DB::stmt("DELETE FROM giudizi WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() === 1;
	}

	// AGGIUNTE

	/** @return Giudizio[] */
	public static function getAllOf(array $utenti): array {
		$where_clause = "";
		$parameters = [];
		if (count($utenti) > 0) {
			$primo_utente = array_pop($utenti);
			$where_clause .= "WHERE utente = ?";
			$parameters = [$primo_utente];
			foreach ($utenti as $utente) {
				$where_clause .= " OR utente = ?";
				$parameters[] = $utente;
			}
		}
		$res = [];
		$stmt = DB::stmt("SELECT utente, film, voto, timestamp FROM giudizi $where_clause ORDER BY timestamp DESC");
		if ($stmt->execute($parameters))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Giudizio($r["utente"], $r["film"], $r["voto"], $r["timestamp"]);
		return $res;
	}

	public static function doRetrieveByUtenteAndFilm(int $utente, int $film): ?Giudizio {
		$stmt = DB::stmt("SELECT utente, film, voto, timestamp FROM giudizi WHERE utente = ? AND film = ?");
		if ($stmt->execute([$utente, $film]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Giudizio($r["utente"], $r["film"], $r["voto"], $r["timestamp"]);
		else
			return null;
	}

	public static function exists(int $utente, int $film): bool {
		$stmt = DB::stmt("SELECT utente FROM giudizi WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente, $film]) and $stmt->rowCount() === 1;
	}

}