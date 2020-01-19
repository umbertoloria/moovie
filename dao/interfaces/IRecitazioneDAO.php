<?php

interface IRecitazioneDAO {

	/**
	 * Preleva tutte le recitazioni espresse da un artista fornito.
	 * @param int $artista_id è l'ID dell'artista
	 * @return Recitazione[] Restituisce un oggetto RECITAZIONE per ogni recitazione con ARTISTA = $artista_id.
	 */
	public function get_from_artista(int $artista_id): array;

	/**
	 * Preleva tutte le recitazioni nell'ambito di un film fornito.
	 * @param int $film_id è l'ID del film
	 * @return Recitazione[] Restituisce un oggetto RECITAZIONE per ogni recitazione con FILM = $film_id.
	 */
	public function get_from_film(int $film_id): array;

	/**
	 * Associa ad un film solo i generi forniti, disassociandolo con tutti gli altri.
	 * @param int   $film_id           è l'ID del film
	 * @param array $assign_genere_ids contiene gli ID dei generi da associare esclusivamente
	 * @return bool Dopo l'esecuzione della funzione, il film con ID = $film_id sarà associato esclusivamente ai generi
	 *                                 i cui ID sono presenti in $assign_genere_ids.
	 */

	/**
	 * Associa ad un film solamente le recitazioni fornite.
	 * @param int           $film_id     è l'ID del film
	 * @param Recitazione[] $recitazioni contiene le recitazioni
	 * @return bool Dopo l'esecuzione della funzione, le recitazioni del film con ID = $film_id saranno esclusivamente
	 *                                   quelle fornite in $recitazioni.
	 */
	public function set_only(int $film_id, array $recitazioni): bool;

}