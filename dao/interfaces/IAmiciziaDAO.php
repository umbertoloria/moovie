<?php

interface IAmiciziaDAO {

	/**
	 * Restituisce tutte le amicizie accettate che coinvolgono un utente.
	 * @param int $user_id è l'ID dell'utente
	 * @return Amicizia[] Restituisce le amicizie accettate che coinvolgono l'utente con ID = $userid.
	 */
	public function getFriendships(int $user_id): array;

	/**
	 * Restituisce tutte le richieste di amicizia che coinvolgono un utente.
	 * @param int $user_id è l'ID dell'utente
	 * @return Amicizia[] Restituisce le richieste di amicizia che coinvolgono l'utente con ID = $userid.
	 */
	public function getRequests(int $user_id): array;

	/**
	 * Indica se esiste una relazione (amicizia richiesta o accettata) tra due utenti.
	 * @param int $user1 è l'ID del primo utente
	 * @param int $user2 è l'ID del secondo utente
	 * @return bool Se esiste una richiesta di amicizia oppure una amicizia accettata tra $user1 e $user2, allora la
	 *                   funzione restituisce TRUE. Altrimenti FALSE.
	 */
	public function existsSomethingBetween(int $user1, int $user2): bool;

	/**
	 * Invia una richiesta di amicizia da un utente verso un altro.
	 * @param int $user_from è l'ID dell'utente sorgente
	 * @param int $user_to   è l'ID dell'utente destinatario
	 * @return bool Se non esiste nessuna relazione (amicizie richieste o accettate) tra $user_from e $user_to, allora
	 *                       viene creata una richiesta di amicizia da $user_from verso $user_to, e la funzione
	 *                       restituisce TRUE. Altrimenti FALSE.
	 */
	public function requestFriendshipFromTo(int $user_from, int $user_to): bool;

	/**
	 * Indica se esiste una richiesta di amicizia inviata da un utente verso un altro.
	 * @param int $user_from è l'ID dell'utente sorgente
	 * @param int $user_to   è l'ID dell'utente destinatario
	 * @return bool Se $user_from ha inviato una richiesta di amicizia verso $user_to, allora la funzione restituisce
	 *                       TRUE. Altrimenti FALSE.
	 */
	public function existsRequestFromTo(int $user_from, int $user_to): bool;

	/**
	 * Cancella la richiesta di amicizia inviata da un utente verso un altro.
	 * @param int $user_from è l'ID dell'utente sorgente
	 * @param int $user_to   è l'ID dell'utente destinatario
	 * @return bool Se $user_from ha richiesto l'amicizia di $user_to, allora questa viene cancellata, e la funzione
	 *                       restituisce TRUE. Altrimenti FALSE.
	 */
	public function removeFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	/**
	 * Trasforma la richiesta di amicizia inviata da un utente verso un altro in una amicizia accettata.
	 * @param int $user_from è l'ID dell'utente sorgente
	 * @param int $user_to   è l'ID dell'utente destinatario
	 * @return bool Se $user_from ha richiesto l'amicizia di $user_to, allora questa viene accettata, e la funzione
	 *                       restituisce TRUE. Altrimenti FALSE.
	 */
	public function acceptFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	/**
	 * Rifiuta la richiesta di amicizia inviata da un utente verso un altro.
	 * @param int $user_from è l'ID dell'utente sorgente
	 * @param int $user_to   è l'ID dell'utente destinatario
	 * @return bool Se $user_from ha richiesto l'amicizia di $user_to, allora questa viene rifiutata, e la funzione
	 *                       restituisce TRUE. Altrimenti FALSE.
	 */
	public function refuseFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	/**
	 * Indica se esiste un'amicizia accettata condivisa tra due utenti forniti.
	 * @param int $user1 è l'ID del primo utente
	 * @param int $user2 è l'ID del secondo utente
	 * @return bool Se esiste un'amicizia accettata condivisa tra $user1 e $user2, la funzione restituisce TRUE.
	 *                   Altrimenti FALSE.
	 */
	public function existsFriendshipBetween(int $user1, int $user2): bool;

	/**
	 * Rimuove un'amicizia accettata condivisa tra due utenti forniti.
	 * @param int $user1 è l'ID del primo utente
	 * @param int $user2 è l'ID del secondo utente
	 * @return bool Se esiste un'amicizia accettata tra $user1 e $user2, allora questa viene cancellata, e la funzione
	 *                   restituisce TRUE. Altrimenti, la funzione restituisce FALSE.
	 */
	public function removeFriendshipBetween(int $user1, int $user2): bool;

}