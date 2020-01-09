<?php

/** @author Umberto Loria */
class Giudizio {

	/** @var int */
	private $utente;
	/** @var int */
	private $film;
	/** @var float */
	private $voto;
	/** @var string */
	private $timestamp;

	public function __construct(int $utente, int $film, float $voto, string $timestamp) {
		$this->utente = $utente;
		$this->film = $film;
		$this->voto = $voto;
		$this->timestamp = $timestamp;
	}

	public function getUtente(): int {
		return $this->utente;
	}

	public function getFilm(): int {
		return $this->film;
	}

	public function getVoto(): float {
		return $this->voto;
	}

	public function setVoto(float $voto) {
		$this->voto = $voto;
	}

	public function getTimestamp(): string {
		return $this->timestamp;
	}

}