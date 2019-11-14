<?php

class Recitazione
{

	/** @var int */
	private $film;
	/** @var int */
	private $artista;
	/** @var string */
	private $personaggio;

	public function __construct(int $film, int $artista, string $personaggio)
	{
		$this->film = $film;
		$this->artista = $artista;
		$this->personaggio = $personaggio;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getArtista(): int
	{
		return $this->artista;
	}

	public function getPersonaggio(): string
	{
		return $this->personaggio;
	}

}