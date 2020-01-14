<?php

interface IGiudizioDAO {

	public function create(Giudizio $giudizio): bool;

	public function update(Giudizio $giudizio): bool;

	public function delete(Giudizio $giudizio): bool;

	/**
	 * @param int[] $utenti_ids
	 * @return Giudizio[]
	 */
	public function getAllOf(array $utenti_ids): array;

	public function get_from_utente_and_film(int $utente_id, int $film_id): ?Giudizio;

	public function exists(int $utente_id, int $film_id): bool;

}