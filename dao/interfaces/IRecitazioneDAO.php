<?php

interface IRecitazioneDAO {

	/**
	 * @param int $artista_id
	 * @return Recitazione[]
	 */
	public function get_from_artista(int $artista_id): array;

	/**
	 * @param int $film_id
	 * @return Recitazione[]
	 */
	public function get_from_film(int $film_id): array;

	/**
	 * @param int           $film_id
	 * @param Recitazione[] $recitazioni
	 * @return bool
	 */
	public function set_only(int $film_id, array $recitazioni): bool;

}