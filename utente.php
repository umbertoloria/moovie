<?php

class Utente
{

	private $nome, $cognome;

	public function __construct($nome, $cognome)
	{
		$this->nome = $nome;
		$this->cognome = $cognome;
	}

	public function getNomeCompleto()
	{
		return $this->nome . " " . $this->cognome;
	}

}