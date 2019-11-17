<?php

class Artista
{

	/** @var int */
	private $id;
	/** @var string */
	private $nome;
	/** @var string */
	private $nascita;
	/** @var string */
	private $descrizione;

	public function __construct(int $id, string $nome, string $nascita, string $descrizione)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->nascita = $nascita;
		$this->descrizione = $descrizione;
	}

	public function getID(): int
	{
		return $this->id;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function getNascita(): string
	{
		return $this->nascita;
	}

	public function getDescrizione(): string
	{
		return $this->descrizione;
	}

	// TODO faccia

}