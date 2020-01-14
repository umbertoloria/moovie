<?php

interface IFilmDAO {

	public function get_from_id(int $id): ?Film;

	/**
	 * @param string $fulltext
	 * @return Film[]
	 */
	public function search(string $fulltext): array;

	/**
	 * @param int $utente_id
	 * @return Film[]
	 */
	public function suggest_me(int $utente_id): array;

	public function downloadCopertina(int $id);

	public function uploadCopertina(int $id, $copertina_bin): bool;

	/** @return Film[] */
	public function getClassifica(): array;

	public function create(Film $film, $copertina_bin): ?Film;

	public function update(Film $film): ?Film;

	public function delete(int $id): bool;

}