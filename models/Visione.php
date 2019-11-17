<?php

class Visione
{

	/** @var int */
	private $utente;
	/** @var int */
	private $film;
	/** @var int */
	private $voto;
	/** @var string */
	private $momento;

	public function __construct(int $utente, int $film, int $voto, string $momento)
	{
		$this->utente = $utente;
		$this->film = $film;
		$this->voto = $voto;
		$this->momento = $momento;
	}

	public function getUtente(): int
	{
		return $this->utente;
	}

	public function getFilm(): int
	{
		return $this->film;
	}

	public function getVoto(): int
	{
		return $this->voto;
	}

	public function getMomento(): string
	{
		return $this->momento;
	}

}