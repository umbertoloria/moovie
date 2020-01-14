<?php

interface IRegiaDAO {

	/**
	 * Dato un ArtistaID, restituisce i FilmID le cui regie sono state curate anche dall'artista.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_films_from_artista(int $id): array;

	/**
	 * Dato un FilmID, restituisce gli ArtistiID che hanno curato la sua regia.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_artisti_from_film(int $id): array;

	public static function set_only(int $film_id, array $registi_id): bool;

}