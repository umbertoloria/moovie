<?php

/** @author Umberto Loria */
class Utente {

	private $id;
	private $nome;
	private $cognome;
	private $email;
	private $password;
	private $gestore;

	public function __construct(int $id, string $nome, string $cognome, string $email, string $password, bool $gestore = false) {
		$this->id = $id;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->email = $email;
		$this->password = $password;
		$this->gestore = $gestore;
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

	public function setPassword(string $password) {
		$this->password = $password;
	}

	public function isGestore(): bool {
		return $this->gestore;
	}

}