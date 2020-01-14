<?php

interface IGenereDAO {

	public function get_from_id(int $id): ?Genere;

	/**
	 * @param int $film_id
	 * @return Genere[]
	 */
	public function get_from_film(int $film_id): array;

	/**
	 * Dato un FilmID, restituisce i GeneriID del film
	 * @param int $id
	 * @return int[]
	 */
	public function get_generi_from_film(int $id): array;

	/**
	 * Restituisce i FilmID di un dato GenereID
	 * @param int $id
	 * @return int[]
	 */
	public function get_films_from_genere(int $id): array;

	/** @return Genere[] */
	public function get_all(): array;

	public function set_only(int $film_id, array $assign_genere_ids): bool;

	public function create(Genere $genere): ?Genere;

	public function update(Genere $genere): ?Genere;

	public function delete(int $id): bool;

	public function exists(string $nome): bool;

}