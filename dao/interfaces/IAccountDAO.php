<?php

interface IAccountDAO {

	/**
	 * Indica se esiste un utente associato l'indirizzo e-mail fornito.
	 * @param string $email è l'email da cercare
	 * @return bool Se esiste un utente con EMAIL = $email la funzione restituisce TRUE. Altrimenti FALSE.
	 */
	public function exists(string $email): bool;

	/**
	 * Aggiunge un nuovo utente con le informazioni fornite.
	 * @param Utente $utente contiene i dati da inserire (nome, cognome, email, password, isGestore)
	 * @return Utente|null
	 *                       Se non esiste un utente con ID = $utente.ID o con EMAIL = $utente.EMAIL, allora ne viene
	 *                       creato uno con le informazioni fornite. La funzione, poi, restituisce un oggetto UTENTE
	 *                       contenente le informazioni del nuovo utente.
	 *                       Altrimenti, la funzione restituisce NULL.
	 */
	public function create(Utente $utente): ?Utente;

	/**
	 * Restituisce le informazioni dell'utente con l'ID fornito.
	 * @param int $id     è l'ID dell'utente da prelevare
	 * @return Utente|null
	 *                    Se esiste l'utente con ID = $id, la funzione restituisce un oggetto UTENTE contenente le sue
	 *                    informazioni.
	 *                    Altrimenti, la funzione restituisce NULL.
	 */
	public function get_from_id(int $id): ?Utente;

	/**
	 * Aggiorna le informazioni di un utente esistente.
	 * @param Utente $utente contiene le informazioni da aggiornare e l'ID col quale trovare l'utente
	 * @return Utente|null
	 *                       Se l'utente con ID = $utente.ID esiste, le sue informazioni vengono modificate e la
	 *                       funzione restitusice un oggetto UTENTE contenente le nuove informazioni.
	 *                       Se l'utente con ID = $utente.ID non esiste, la funzione restituisce NULL.
	 */
	public function update(Utente $utente): ?Utente;

	public function authenticate(string $email, string $password): ?Utente;

	/**
	 * Ricerca gli utenti con campi NOME e COGNOME correlati al parametro FULLTEXT fornito.
	 * @param string $fulltext è il parametro FULLTEXT da cui cercare similitudini
	 * @return Utente[] La funzione restituisce tutti gli utenti con informazioni correlate al parametro $fulltext.
	 */
	public function search(string $fulltext): array;

	/**
	 * Rimuove l'utente con l'ID fornito.
	 * @param int $id è l'ID dell'utente da rimuovere
	 * @return bool Se viene cancellato un utente con ID = $id, la funzione restitusice TRUE, altrimenti FALSE.
	 */
	public function delete(int $id): bool;

}