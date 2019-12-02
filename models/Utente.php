<?php

/** @author Umberto Loria */
class Utente {

	/** @var int */
	private $id;
	/** @var string */
	private $nome;
	/** @var string */
	private $cognome;
	/** @var string */
	private $email;
	/** @var string */
	private $password;

	public function __construct(int $id, string $nome, string $cognome, string $email, string $password) {
		$this->id = $id;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->email = $email;
		$this->password = $password;
	}

	public function getID(): int {
		return $this->id;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function getCognome(): string {
		return $this->cognome;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function getPassword(): string {
		return $this->password;
	}

	/** @return Utente? */
	public static function register(string $nome, string $cognome, string $email, string $password) {
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
		if ($stmt->execute([$nome, $cognome, $email, $password]))
			return self::retrieveByID(DB::lastInsertedID());
		else
			return null;
	}

	/** @return Utente? */
	public static function retrieveByID(int $id) {
		$stmt = DB::stmt("SELECT * FROM utenti WHERE id = ?");
		if ($stmt->execute([$id])) {
			$r = $stmt->fetch();
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		} else {
			return null;
		}
	}

	/** @return Utente? */
	public static function retrieveByEmail(string $email) {
		$stmt = DB::stmt("SELECT * FROM utenti WHERE email = ?");
		if ($stmt->execute([$email])) {
			$r = $stmt->fetch();
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"], $r["password"]);
		} else {
			return null;
		}
	}

	/** @return bool */
	public static function deleteByID(int $id) {
		$stmt = DB::stmt("DELETE FROM utenti WHERE id = ?");
		return $stmt->execute([$id]) and $stmt->rowCount() > 0;
	}

}