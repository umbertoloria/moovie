<?php

/** @author Gianluca Pirone */
class Film
{

	/** @var int */
	private $id;
	/** @var string */
	private $titolo;
	/** @var int */
	private $durata;
	/** @var int */
	private $anno;
	/** @var string */
	private $descrizione;

	public function __construct(int $id, string $titolo, int $durata, int $anno, string $descrizione)
	{
		$this->id = $id;
		$this->titolo = $titolo;
		$this->durata = $durata;
		$this->anno = $anno;
		$this->descrizione = $descrizione;
	}

	public function getID(): int
	{
		return $this->id;
	}

	public function getTitolo(): string
	{
		return $this->titolo;
	}

	public function getDurata(): int
	{
		return $this->durata;
	}

	public function getAnno(): int
	{
		return $this->anno;
	}

	public function getDescrizione(): string
	{
		return $this->descrizione;
	}

}