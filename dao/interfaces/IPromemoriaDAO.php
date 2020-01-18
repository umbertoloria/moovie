<?php

interface IPromemoriaDAO {

	/**
	 * Preleva tutti i promemoria salvati da un utente fornito.
	 * @param int $utente_id è l'ID dell'utente
	 * @return Promemoria[] Restituisce un oggetto PROMEMORIA per ogni promemoria con UTENTE = $utente_id.
	 */
	public function get_from_utente(int $utente_id): array;

	/**
	 * Indica se esiste un promemoria salvato da un utente fornito verso un film fornito.
	 * @param int $utente_id è l'ID dell'utente
	 * @param int $film_id   è l'ID del film
	 * @return bool Se esiste un promemoria con UTENTE = $utente_id e FILM = $film_id, la funzione restituisce TRUE.
	 *                       Altrimenti FALSE.
	 */
	public function exists(int $utente_id, int $film_id): bool;

	/**
	 * Aggiunge il promemoria fornito.
	 * @param Promemoria $promemoria contiene le informazioni da salvare
	 * @return bool Se non esiste un promemoria con UTENTE = $promemoria.UTENTE e FILM = $promemoria.FILM, le
	 *                               informazioni contenute in $promemoria vengono salvate, e la funzione restituisce
	 *                               TRUE. Altrimenti FALSE.
	 */
	public function create(Promemoria $promemoria): bool;

	/**
	 * Rimuove un promemoria fornito.
	 * @param Promemoria $promemoria
	 * @return bool Se esiste un promemoria con UTENTE = $promemoria.UTENTE e FILM = $promemoria.FILM, allora
	 *              restituisce TRUE. Altrimenti FALSE.
	 */
	public function delete(Promemoria $promemoria): bool;

	/**
	 * Preleva (se esiste) il promemoria salvato dall'utente fornito verso il film fornito.
	 * @param int $utente_id   è l'ID dell'utente
	 * @param int $film_id     è l'ID del film
	 * @return Promemoria|null La funzione restituisce un oggetto PROMEMORIA contenente le informazioni del promemoria
	 *                         con UTENTE = $utente_id e FILM = $film_id salvato. Se non esiste, restituisce NULL.
	 */
	public function get_from_utente_and_film(int $utente_id, int $film_id): ?Promemoria;

}