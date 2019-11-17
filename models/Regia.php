<?php

class Regia
{
	/** @var int */
	private $film;
	/** @var int */
	private $artista;

	public function __construct(int $film, int $artista)
	{
		$this->film = $film;
		$this->artista = $artista;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getArtista(): int
	{
		return $this->artista;
	}

}