<?php

interface IArtistaDAO {

	public function get_from_id(int $id): ?Artista;

	public function downloadFaccia(int $id);

	public function uploadFaccia(int $id, $faccia_bin): bool;

	/**
	 * @param string $fulltext
	 * @return Artista[]
	 */
	public function search(string $fulltext): array;

	public function create(Artista $artista, $faccia_bin): ?Artista;

	/** @return Artista[] */
	public function get_all(): array;

	public function update(Artista $artista): ?Artista;

	public function delete(int $id): bool;

}