<?php

/** @author Gianluca Pirone */
class Recitazione
{

	/** @var int */
	private $film;
	/** @var int */
	private $attore;
	/** @var string */
	private $personaggio;

	public function __construct(int $film, int $attore, string $personaggio)
	{
		$this->film = $film;
		$this->attore = $attore;
		$this->personaggio = $personaggio;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getAttore(): int
	{
		return $this->attore;
	}

	public function getPersonaggio(): string
	{
		return $this->personaggio;
	}

}