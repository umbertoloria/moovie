<?php

class ListaManager {

	public static function exists(int $user_id, string $list_name): bool {
		$stmt = DB::stmt("SELECT id FROM liste WHERE proprietario = ? AND nome = ?");
		return $stmt->execute([$user_id, $list_name]) and $stmt->rowCount() === 1;
	}

	public static function create(int $user_id, string $name, string $visibility): ?Lista {
		assert($visibility === "tutti" || $visibility === "amici" || $visibility === "solo_tu");
		$stmt = DB::stmt("INSERT INTO liste (proprietario, nome, visibilità) VALUES (?, ?, ?)");
		if ($stmt->execute([$user_id, $name, $visibility]))
			return new Lista(DB::lastInsertedID(), $user_id, $name, $visibility, []);
		else
			return null;
	}

	public static function is_owner(int $user_id, int $list_id): bool {
		$stmt = DB::stmt("SELECT id FROM liste WHERE id = ? AND proprietario = ?");
		return $stmt->execute([$list_id, $user_id]) and $stmt->rowCount() === 1;
	}

	public static function modify(int $list_id, string $nome, string $visibility): ?Lista {
		assert($visibility === "tutti" || $visibility === "amici" || $visibility === "solo_tu");
		$stmt = DB::stmt("UPDATE liste SET nome = ?, visibilità = ? WHERE id = ?");
		if ($stmt->execute([$nome, $visibility, $list_id]) and $stmt->rowCount() === 1)
			return self::doRetrieveByID($list_id);
		else
			return null;
	}

	public static function delete(int $list_id): bool {
		// TODO: Transazione
		$stmt1 = DB::stmt("DELETE FROM lista_has_film WHERE lista = ?");
		if (!$stmt1->execute([$list_id]))
			return false;
		$stmt2 = DB::stmt("DELETE FROM liste WHERE id = ?");
		if (!$stmt2->execute([$list_id]))
			return false;
		return $stmt2->rowCount() === 1;
	}

	/**
	 * @param int[] $selected_lists
	 * @return bool
	 */
	public static function insert_film_only(int $user_id, int $film_id, array $selected_lists) {
		// TODO: Transazione
		// FIXME: Controlla se esiste questo film
		$list_ids = [];
		$stmt = DB::stmt("SELECT id FROM liste WHERE proprietario = ?");
		if ($stmt->execute([$user_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$list_ids[] = $r["id"];

		foreach ($selected_lists as $selected_list)
			if (!in_array($selected_list, $list_ids))
				return false;

		$errors = [];
		foreach ($list_ids as $list_id) {
			if (in_array($list_id, $selected_lists)) {
				$stmt = DB::stmt("SELECT film FROM lista_has_film WHERE lista = ? AND film = ?");
				if (!$stmt->execute([$list_id, $film_id])) {
					$errors[] = "impossibile sapere se il film {$film_id} è nella lista {$list_id}";
				}
				if ($stmt->rowCount() === 0) {
					// Non c'era già, e lo devo creare
					$stmt = DB::stmt("INSERT INTO lista_has_film SET lista = ?, film = ?");
					if (!$stmt->execute([$list_id, $film_id])) {
						$errors[] = "impossibile inserire il film {$film_id} nella lista {$list_id}";
					}
				}
				// put it in
			} else {
				// drop it out
				$stmt = DB::stmt("DELETE FROM lista_has_film WHERE lista = ? AND film = ?");
				if (!$stmt->execute([$list_id, $film_id])) {
					$errors[] = "impossibile eliminare il film {$film_id} dalla lista {$list_id}";
				}
			}
		}

		var_dump($errors);

		return $errors === [];
	}

	// AGGIUNTE

	public static function doRetrieveByID(int $id): ?Lista {
		$stmt1 = DB::stmt("SELECT id, proprietario, nome, visibilità FROM liste WHERE id = ?");
		if ($stmt1->execute([$id]) and $r1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
			$films = [];
			$stmt2 = DB::stmt("SELECT film FROM lista_has_film WHERE lista = ?");
			if ($stmt2->execute([$id]))
				while ($r2 = $stmt2->fetch(PDO::FETCH_ASSOC))
					$films[] = $r2["film"];
			return new Lista($r1["id"], $r1["proprietario"], $r1["nome"], $r1["visibilità"], $films);
		} else
			return null;
	}

	/** @return Lista[] */
	public static function getAllOf(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT id FROM liste WHERE proprietario = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = self::doRetrieveByID($r["id"]);
		return $res;
	}

	public static function contains(int $lista_id, int $film_id): bool {
		$stmt = DB::stmt("SELECT film FROM lista_has_film WHERE lista = ? AND film = ?");
		return $stmt->execute([$lista_id, $film_id]) and $stmt->rowCount() === 1;
	}

}