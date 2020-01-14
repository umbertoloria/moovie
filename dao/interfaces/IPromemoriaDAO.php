<?php

interface IPromemoriaDAO {

	/**
	 * @param int $utente_id
	 * @return Promemoria[]
	 */
	public function get_from_utente(int $utente_id): array;

	public function exists(int $utente_id, int $film_id): bool;

	public function create(Promemoria $promemoria): bool;

	public function delete(Promemoria $promemoria): bool;

	public function get_from_utente_and_film(int $utente_id, int $film_id): ?Promemoria;

}