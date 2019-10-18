<?php

class Utente {

	/** @var string */
	private $nome;
	/** @var string */
	private $cognome;
	/** @var string */
	private $password;
	/** @var string */
	private $email;
	/** @var bool */
	private $adminFlag;

	public function __construct(string $nome, string $cognome, string $password, string $email, bool $adminFlag) {
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->password = $password;
		$this->email = $email;
		$this->adminFlag = $adminFlag;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function getCognome(): string {
		return $this->cognome;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function getAdminFlag(): bool {
		return $this->adminFlag;
	}

}