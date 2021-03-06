<?php

class DBGenereDAO implements IGenereDAO {

	public function findByID(int $id): ?Genere {
		$stmt = DB::stmt("SELECT id, nome FROM generi WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Genere($r["id"], $r["nome"]);
		else
			return null;
	}

	/** @inheritDoc */
	public function findGeneriByFilm(int $film_id): array {
		$res = [];
		$stmt = DB::stmt("SELECT genere FROM film_has_genere WHERE film = ?");
		if ($stmt->execute([$film_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = intval($r["genere"]);
		return $res;
	}

	/** @inheritDoc */
	public function findFilmsByGenere(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film FROM film_has_genere WHERE genere = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = intval($r["film"]);
		return $res;
	}

	/** @inheritDoc */
	public function getAll(): array {
		$res = [];
		$stmt = DB::stmt("SELECT id, nome FROM generi ORDER BY nome");
		if ($stmt->execute([]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Genere($r["id"], $r["nome"]);
		return $res;
	}

	public function setOnly(int $film_id, array $assign_genere_ids): bool {
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

	public function create(Genere $genere): ?Genere {
		$stmt = DB::stmt("INSERT INTO generi SET nome = ?");
		if ($stmt->execute([$genere->getNome()]))
			return self::findByID(DB::lastInsertedID());
		else
			return null;
	}

	public function update(Genere $genere): ?Genere {
		$stmt = DB::stmt("UPDATE generi SET nome = ? WHERE id = ?");
		if ($stmt->execute([$genere->getNome(), $genere->getID()]) and $stmt->rowCount() === 1)
			return self::findByID($genere->getID());
		else
			return null;
	}

	public function delete(int $id): bool {
		$stmt = DB::stmt("DELETE FROM generi WHERE id = ?");
		return $stmt->execute([$id]) and $stmt->rowCount() === 1;
	}

	public function exists(string $nome): bool {
		$stmt = DB::stmt("SELECT id FROM generi WHERE nome = ?");
		return $stmt->execute([$nome]) and $stmt->rowCount() > 0;
	}

}