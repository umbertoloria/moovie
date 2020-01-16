<?php

/** @author Gianluca Pirone, Umberto Loria */
class Artista
{

	private $id;
	private $nome;
	private $nascita;
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

	public function setNome(string $nome)
	{
		$this->nome = $nome;
	}

	public function getNascita(): string
	{
		return $this->nascita;
	}

	public function setNascita(string $nascita)
	{
		$this->nascita = $nascita;
	}

	public function getDescrizione(): string
	{
		return $this->descrizione;
	}

	public function setDescrizione(string $descrizione)
	{
		$this->descrizione = $descrizione;
	}

}