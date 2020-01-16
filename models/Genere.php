<?php

/** @author Gianluca Pirone, Umberto Loria */
class Genere
{

	private $id;
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

	public function setNome(string $nome)
	{
		$this->nome = $nome;
	}

}