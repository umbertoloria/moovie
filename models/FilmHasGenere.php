<?php

class FilmHasGenere
{

	/** @var int */
	private $film;
	/** @var int */
	private $genere;

	public function __construct(int $film, int $genere)
	{
		$this->film = $film;
		$this->genere = $genere;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getGenere(): int
	{
		return $this->genere;
	}

}