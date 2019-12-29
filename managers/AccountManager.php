<?php

class AccountManager {

	public static function exists(string $email): bool {
		$stmt = DB::stmt("SELECT email FROM utenti WHERE email = ?");
		return $stmt->execute([$email]) and $stmt->rowCount() === 1;
	}

	// Il campo 'id' dell'istanza Utente viene ignorato.
	public static function create(Utente $utente): ?Utente {
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password, gestore) VALUES (?, ?, ?, ?, ?)");
		$stmt->bindValue(1, $utente->getNome());
		$stmt->bindValue(2, $utente->getCognome());
		$stmt->bindValue(3, $utente->getEmail());
		$stmt->bindValue(4, $utente->getPassword());
		$stmt->bindValue(5, $utente->isGestore(), PDO::PARAM_BOOL);
		if ($stmt->execute())
			return self::get_from_id(DB::lastInsertedID());
		else
			return null;
	}

	public static function get_from_id(int $id): ?Utente {
		$stmt = DB::stmt("SELECT id, nome, cognome, email, password, gestore FROM utenti WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
				$r["password"], $r["gestore"] == 1);
		else
			return null;
	}

	public static function update(Utente $utente): ?Utente {

		$utente_reale = self::get_from_id($utente->getID());
		if (!$utente_reale)
			return null;

		$same_nome = $utente_reale->getNome() === $utente->getNome();
		$same_cognome = $utente_reale->getCognome() === $utente->getCognome();
		$same_email = $utente_reale->getEmail() === $utente->getEmail();
		$same_password = $utente_reale->getPassword() === $utente->getPassword();
		$same_gestore = $utente_reale->isGestore() === $utente->isGestore();

		if ($same_nome and $same_cognome and $same_email and $same_password and $same_gestore)
			return $utente;

		DB::beginTransaction();

		if (!$same_nome) {
			$stmt_nome = DB::stmt("UPDATE utenti SET nome = ? WHERE id = ?");
			if (
				!$stmt_nome->execute([$utente->getNome(), $utente->getID()])
				or $stmt_nome->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_cognome) {
			$stmt_cognome = DB::stmt("UPDATE utenti SET cognome = ? WHERE id = ?");
			if (
				!$stmt_cognome->execute([$utente->getCognome(), $utente->getID()])
				or $stmt_cognome->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_email) {
			$stmt_email = DB::stmt("UPDATE utenti SET email = ? WHERE id = ?");
			if (
				!$stmt_email->execute([$utente->getEmail(), $utente->getID()])
				or $stmt_email->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_password) {
			$stmt_password = DB::stmt("UPDATE utenti SET password = ? WHERE id = ?");
			if (
				!$stmt_password->execute([$utente->getPassword(), $utente->getID()])
				or $stmt_password->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_gestore) {
			$stmt_gestore = DB::stmt("UPDATE utenti SET gestore = ? WHERE id = ?");
			if (
				!$stmt_gestore->execute([$utente->isGestore() ? 1 : 0, $utente->getID()])
				or $stmt_gestore->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		DB::commitTransaction();
		return self::get_from_id($utente->getID());
	}

	public static function authenticate(string $email, string $password): ?Utente {
		$stmt = DB::stmt(
			"SELECT id, nome, cognome, email, password, gestore FROM utenti WHERE email = ? AND password = ?");
		if ($stmt->execute([$email, sha1($password)]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
				$r["password"], $r["gestore"] == 1);
		else
			return null;
	}

	/** @return Utente[] */
	public static function search(string $fulltext): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome, cognome, email, password, gestore FROM utenti
				WHERE MATCH(nome) AGAINST(? IN NATURAL LANGUAGE MODE)
					OR MATCH(cognome) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
					$r["password"], $r["gestore"] == 1);
		return $res;
	}

	public static function delete(Utente $utente): bool {
		$stmt = DB::stmt("DELETE FROM utenti WHERE (id = :id OR email = :email) OR email = :email");
		return $stmt->execute([":id" => $utente->getID(), ":email" => $utente->getEmail()]) and $stmt->rowCount() === 1;
	}

}