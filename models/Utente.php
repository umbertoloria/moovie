<?php

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

}