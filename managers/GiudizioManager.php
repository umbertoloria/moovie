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

	public static function drop(Giudizio $giudizio): bool {
		$stmt = DB::stmt("DELETE FROM giudizi WHERE utente = ? AND film = ?");
		return $stmt->execute([$giudizio->getUtente(), $giudizio->getFilm()]) and $stmt->rowCount() === 1;
	}

	// AGGIUNTE

	/**
	 * @param int[] $utenti_ids
	 * @return Giudizio[]
	 */
	public static function getAllOf(array $utenti_ids): array {
		$where_clause = "";
		$parameters = [];
		if (count($utenti_ids) > 0) {
			$primo_utente = array_pop($utenti_ids);
			$where_clause .= "WHERE utente = ?";
			$parameters = [$primo_utente];
			foreach ($utenti_ids as $utente) {
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

	public static function get_from_utente_and_film(int $utente_id, int $film_id): ?Giudizio {
		$stmt = DB::stmt("SELECT utente, film, voto, timestamp FROM giudizi WHERE utente = ? AND film = ?");
		if ($stmt->execute([$utente_id, $film_id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Giudizio($r["utente"], $r["film"], $r["voto"], $r["timestamp"]);
		else
			return null;
	}

	public static function exists(int $utente_id, int $film_id): bool {
		$stmt = DB::stmt("SELECT utente FROM giudizi WHERE utente = ? AND film = ?");
		return $stmt->execute([$utente_id, $film_id]) and $stmt->rowCount() === 1;
	}

}