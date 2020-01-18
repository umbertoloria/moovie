<?php

interface IRegiaDAO {

	/**
	 * Preleva i film di cui un artista fornito ha partecipato alla regia.
	 * @param int $id è l'ID dell'artista
	 * @return int[] Restituisce l'ID di un film solo se la sua regia è stata curata dall'artista con ID = $id.
	 */
	public static function get_films_from_artista(int $id): array;

	/**
	 * Preleva gli artisti che hanno partecipato alla regia di un film fornito.
	 * @param int $id è l'ID del film
	 * @return int[] Restituisce gli ID dei registi del film con ID = $id.
	 */
	public static function get_artisti_from_film(int $id): array;

	/**
	 * Associa ad un film solamente i registi forniti.
	 * @param int   $film_id    è l'ID del film
	 * @param int[] $registi_id contiene gli ID degli artisti
	 * @return bool Dopo l'esecuzione della funzione, i registi di un film con ID = $film_id saranno esclusivamente
	 *                          quelli forniti in $registi_id.
	 */
	public static function set_only(int $film_id, array $registi_id): bool;

}