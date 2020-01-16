<?php

/** @author Umberto Loria */
class Amicizia {

	private $utente_from;
	private $utente_to;
	private $timestamp_richiesta;
	private $timestamp_accettazione;

	public function __construct(int $utente_from, int $utente_to, string $timestamp_richiesta, ?string $timestamp_accettazione) {
		$this->utente_from = $utente_from;
		$this->utente_to = $utente_to;
		$this->timestamp_richiesta = $timestamp_richiesta;
		$this->timestamp_accettazione = $timestamp_accettazione;
	}

	public function getUtenteFrom(): int {
		return $this->utente_from;
	}

	public function getUtenteTo(): int {
		return $this->utente_to;
	}

	public function getTimestampRichiesta(): string {
		return $this->timestamp_richiesta;
	}

	public function getTimestampAccettazione(): ?string {
		return $this->timestamp_accettazione;
	}

}