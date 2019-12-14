<?php

/** @author Umberto Loria */
class SuggerimentoFilm {

	/** @var int */
	private $utente_from;
	/** @var int */
	private $utente_to;
	/** @var int */
	private $film;
	/** @var string */
	private $timestamp;

	public function __construct(int $utente_from, int $utente_to, int $film, string $timestamp) {
		$this->utente_from = $utente_from;
		$this->utente_to = $utente_to;
		$this->film = $film;
		$this->timestamp = $timestamp;
	}

	public function getUtenteFrom(): int {
		return $this->utente_from;
	}

	public function getUtenteTo(): int {
		return $this->utente_to;
	}

	public function getFilm(): int {
		return $this->film;
	}

	public function getTimestamp(): string {
		return $this->timestamp;
	}

}