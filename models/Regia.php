<?php

class Regia
{

	/** @var int */
	private $film;
	/** @var int */
	private $regista;

	public function __construct(int $film, int $regista)
	{
		$this->film = $film;
		$this->regista = $regista;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getRegista(): int
	{
		return $this->regista;
	}

}