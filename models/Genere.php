<?php

class Genere
{

	/** @var int */
	private $id;
	/** @var string */
	private $nome;

	public function __construct(int $id, string $nome)
	{
		$this->id = $id;
		$this->nome = $nome;
	}

	public function getID(): int
	{
		return $this->id;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

}