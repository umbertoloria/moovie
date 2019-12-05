<?php

class AccountManager {

	public static function exists(string $email): bool {
		$stmt = DB::stmt("SELECT email FROM utenti WHERE email = ?");
		return $stmt->execute([$email]) and $stmt->rowCount() === 1;
	}

	public static function create(string $nome, string $cognome, string $email, string $password): ?Utente {
		$password = sha1($password);
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
		if ($stmt->execute([$nome, $cognome, $email, $password]))
			return new Utente(DB::lastInsertedID(), $nome, $cognome, $email, $password);
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

}