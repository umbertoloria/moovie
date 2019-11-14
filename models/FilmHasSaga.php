<?php

class FilmHasSaga
{

	/** @var int */
	private $film;
	/** @var int */
	private $saga;

	public function __construct(int $film, int $saga)
	{
		$this->film = $film;
		$this->saga = $saga;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getSaga(): int
	{
		return $this->saga;
	}

}