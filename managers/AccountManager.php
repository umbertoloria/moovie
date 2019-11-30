<?php

class AccountManager {

	public static function exists(string $email) {
		$stmt = DB::stmt("SELECT email FROM utenti WHERE email = ?");
		return $stmt->execute([$email]) and $stmt->rowCount() === 1;
	}

	public static function create(string $nome, string $cognome, string $email, string $password) {
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
		if ($stmt->execute([$nome, $cognome, $email, $password]))
			return self::get(DB::lastInsertedID());
		else
			return null;
	}

	// AGGIUNTE

	public static function get(int $id) {
		$stmt = DB::stmt("SELECT id, nome, cognome, email, password FROM utenti WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		else
			return null;
	}

}