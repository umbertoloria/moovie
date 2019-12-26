<?php

/**
 * Ogni film può avere più generi, e ogni genere può appartenere a più film.
 *
 * GenereManager permette di:
 * * prelevare un genere
 * * prelevare tutti i generi di un film
 * * conoscere solo gli id di tutti i generi di un film
 *
 * @see    Genere
 * @author Umberto Loria
 */
class GenereManager {

	// AGGIUNTE

	public static function doRetrieveByID(int $id): ?Genere {
		$stmt = DB::stmt("SELECT id, nome FROM generi WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Genere($r["id"], $r["nome"]);
		else
			return null;
	}

	/** @return Genere[] */
	public static function doRetrieveByFilm(int $id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome
				FROM film_has_genere
				    JOIN generi
				        ON film_has_genere.genere = generi.id
				WHERE film = ?
				ORDER BY nome");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Genere($r["id"], $r["nome"]);
		return $res;
	}

	/**
	 * Dato un FilmID, restituisce i GeneriID del film
	 * @param int $id
	 * @return int[]
	 */
	public static function get_generi_from_film(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT genere FROM film_has_genere WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $r["genere"];
		return $res;
	}

	/**
	 * Restituisce i FilmID di un dato GenereID
	 * @param int $id
	 * @return int[]
	 */
	public static function get_films_from_genere(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film FROM film_has_genere WHERE genere = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $r["film"];
		return $res;
	}

	/** @return Genere[] */
	public static function get_all(): array {
		$res = [];
		$stmt = DB::stmt("SELECT id, nome FROM generi ORDER BY nome");
		if ($stmt->execute([]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Genere($r["id"], $r["nome"]);
		return $res;
	}

	public static function set_only(int $film_id, array $assign_genere_ids): bool {
		DB::beginTransaction();
		// Prelevo tutti i generi esistenti
		$all_generes = [];
		$stmt_status = DB::stmt("SELECT id FROM generi");
		if (!$stmt_status->execute([])) {
			DB::rollbackTransaction();
			return false;
		}
		while ($r = $stmt_status->fetch(PDO::FETCH_ASSOC))
			$all_generes[] = $r["id"];
		// Verifico che i generi da assegnare esistano
		foreach ($assign_genere_ids as $genere_id) {
			if (!in_array($genere_id, $all_generes)) {
				// Genere non esistente!
				DB::rollbackTransaction();
				return false;
			}
		}
		// Processo tutti i generi esistenti
		foreach ($all_generes as $genere_id) {
			// Controlla se il genere è attualmente assegnato
			$stmt_status = DB::stmt("SELECT film FROM film_has_genere WHERE film = ? AND genere = ?");
			if (!$stmt_status->execute([$film_id, $genere_id])) {
				DB::rollbackTransaction();
				return false;
			}
			if ($stmt_status->rowCount() === 1) {
				// Se è attualmente assegnato...
				if (!in_array($genere_id, $assign_genere_ids)) {
					// ... e non lo vuoi assegnato, allora toglilo
					$stmt = DB::stmt("DELETE FROM film_has_genere WHERE film = ? AND genere = ?");
					if (!$stmt->execute([$film_id, $genere_id]) or $stmt->rowCount() !== 1) {
						DB::rollbackTransaction();
						return false;
					}
				}
				// altrimenti lascia tutto come sta
			} else {
				// Se non è attualmente assegnato...
				if (in_array($genere_id, $assign_genere_ids)) {
					// ... ma vuoi che lo sia, allora assegnalo
					$stmt = DB::stmt("INSERT INTO film_has_genere SET film = ?, genere = ?");
					if (!$stmt->execute([$film_id, $genere_id])) {
						DB::rollbackTransaction();
						return false;
					}
				}
				// altrimenti, pure qui, lascia tutto come sta
			}
		}
		DB::commitTransaction();
		return true;
	}

	public static function create(Genere $genere): ?Genere {
		$stmt = DB::stmt("INSERT INTO generi SET nome = ?");
		if ($stmt->execute([$genere->getNome()]))
			return self::doRetrieveByID(DB::lastInsertedID());
		else
			return null;
	}

	public static function update(Genere $genere): ?Genere {
		$stmt = DB::stmt("UPDATE generi SET nome = ? WHERE id = ?");
		if ($stmt->execute([$genere->getNome(), $genere->getID()]) and $stmt->rowCount() === 1)
			return self::doRetrieveByID($genere->getID());
		else
			return null;
	}

	public static function delete(int $genere_id): bool {
		$stmt = DB::stmt("DELETE FROM generi WHERE id = ?");
		return $stmt->execute([$genere_id]) and $stmt->rowCount() === 1;
	}

	public static function exists(string $nome): bool {
		$stmt = DB::stmt("SELECT id FROM generi WHERE nome = ?");
		return $stmt->execute([$nome]) and $stmt->rowCount() > 0;
	}

}