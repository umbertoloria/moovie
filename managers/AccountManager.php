<?php

class AccountManager {

	public static function exists(string $email): bool {
		$stmt = DB::stmt("SELECT email FROM utenti WHERE email = ?");
		return $stmt->execute([$email]) and $stmt->rowCount() === 1;
	}

	public static function save(Utente $utente): ?Utente {
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
		if ($stmt->execute([$utente->getNome(), $utente->getCognome(), $utente->getEmail(), $utente->getPassword()]))
			return new Utente(
				DB::lastInsertedID(),
				$utente->getNome(),
				$utente->getCognome(),
				$utente->getEmail(),
				$utente->getPassword()
			);
		else
			return null;
	}

	public static function authenticate(string $email, string $password): ?Utente {
		$stmt = DB::stmt("SELECT id, nome, cognome, email, password FROM utenti WHERE email = ? AND password = ?");
		if ($stmt->execute([$email, sha1($password)]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		else
			return null;
	}

	// AGGIUNTE

	public static function doRetrieveByID(int $id): ?Utente {
		$stmt = DB::stmt("SELECT id, nome, cognome, email, password FROM utenti WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		else
			return null;
	}

	/** @return Utente[] */
	public static function search(string $fulltext): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome, cognome, email, password FROM utenti
				WHERE MATCH(nome) AGAINST(? IN NATURAL LANGUAGE MODE)
					OR MATCH(cognome) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		return $res;
	}

}