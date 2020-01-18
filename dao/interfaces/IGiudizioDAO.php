<?php

interface IGiudizioDAO {

	/**
	 * Aggiunge il giudizio fornito.
	 * @param Giudizio $giudizio contiene le informazioni da salvare
	 * @return bool Se non esiste un giudizio con UTENTE = $giudizio.UTENTE e FILM = $giudizio.FILM, le informazioni
	 *                           contenute in $giudizio vengono salvate, e la funzione restituisce TRUE. Altrimenti
	 *                           FALSE.
	 */
	public function create(Giudizio $giudizio): bool;

	/**
	 * Aggiorna il giudizio fornito.
	 * @param Giudizio $giudizio contiene le informazioni da aggiornare
	 * @return bool Se esiste un giudizio con UTENTE = $giudizio.UTENTE e FILM = $giudizio.FILM e VOTO !=
	 *                           $giudizio.VOTO, allora le sue informazioni viene aggiornate e la funzione restitusice
	 *                           TRUE. Altrimenti FALSE.
	 */
	public function update(Giudizio $giudizio): bool;

	/**
	 * Rimuove il giudizio fornito.
	 * @param Giudizio $giudizio è il giudizio da rimuovere.
	 * @return bool Se esiste un giudizio con UTENTE = $giudizio.UTENTE e FILM = $giudizio.FILM, allora viene
	 *                           cancellato e la funzione restituisce TRUE. Altrimenti FALSE.
	 */
	public function delete(Giudizio $giudizio): bool;

	/**
	 * Preleva tutti i giudizi espressi degli utenti forniti.
	 * @param int[] $utenti_ids contiene gli ID degli utenti
	 * @return Giudizio[] Restituisce un oggetto GIUDIZIO per ogni giudizio il cui UTENTE è presente in $utenti_ids.
	 */
	public function getAllOf(array $utenti_ids): array;

	/**
	 * Preleva (se esiste) il giudizio espresso dall'utente fornito verso il film fornito.
	 * @param int $utente_id è l'ID dell'utente
	 * @param int $film_id   è l'ID del film
	 * @return Giudizio|null La funzione restituisce un oggetto GIUDIZIO contenente le informazioni del giudizio con
	 *                       UTENTE = $utente_id e FILM = $film_id salvato. Se non esiste, restituisce NULL.
	 */
	public function get_from_utente_and_film(int $utente_id, int $film_id): ?Giudizio;

	/**
	 * Indica se esiste un giudizio espresso da un utente fornito verso un film fornito.
	 * @param int $utente_id è l'ID dell'utente
	 * @param int $film_id   è l'ID del film
	 * @return bool Se esiste un giudizio con UTENTE = $utente_id e FILM = $film_id, la funzione restituisce TRUE.
	 *                       Altrimenti FALSE.
	 */
	public function exists(int $utente_id, int $film_id): bool;

}