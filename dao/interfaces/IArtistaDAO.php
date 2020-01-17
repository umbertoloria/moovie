<?php

interface IArtistaDAO {

	/**
	 * Restituisce le informazioni dell'artista con l'ID fornito.
	 * @param int $id       è l'ID dell'artista da prelevare
	 * @return Artista|null Se esiste un artista con ID = $id, allora la funzione restituisce un oggetto ARTISTA
	 *                      contenente le sue informazioni. Altrimenti, la funzione restituisce NULL.
	 */
	public function get_from_id(int $id): ?Artista;

	/**
	 * Preleva l'immagine dell'artista con l'ID fornito.
	 * @param int $id è l'ID dell'artista
	 * @return mixed Se esiste un artista con ID = $id, la funzione restituisce la sua immagine. Altrimenti NULL.
	 */
	public function downloadFaccia(int $id);

	/**
	 * Memorizza l'immagine dell'artista con l'ID fornito.
	 * @param int   $id         è l'ID dell'artista
	 * @param mixed $faccia_bin è l'immagine da memorizzare
	 * @return bool Se esiste un artista con ID = $id, ed è stato possibile sovrascrivere la sua immagine, la funzione
	 *                          restituisce TRUE. Altrimenti FALSE.
	 */
	public function uploadFaccia(int $id, $faccia_bin): bool;


	/**
	 * Ricerca gli artisti con campi NOME e DESCRIZIONE correlati al parametro FULLTEXT fornito.
	 * @param string $fulltext è il parametro FULLTEXT da cui cercare similitudini
	 * @return Artista[] La funzione restituisce tutti gli artisti con informazioni correlate al parametro $fulltext.
	 */
	public function search(string $fulltext): array;

	/**
	 * Aggiunge un nuovo artista con le informazioni fornite.
	 * @param Artista $artista    contiene i dati da inserire (nome, data di nascita, descrizione)
	 * @param mixed   $faccia_bin contiene l'immagine da inserire
	 * @return Utente|null
	 *                            Se non esiste un artista con ID = $artista.ID, allora ne viene creato uno con
	 *                            l'immagine e le informazioni fornite. La funzione, poi, restituisce un oggetto
	 *                            ARTISTA contenente le informazioni del nuovo artista.
	 *                            Altrimenti, la funzione restituisce NULL.
	 */
	public function create(Artista $artista, $faccia_bin): ?Artista;

	/**
	 * Preleva tutti gli artisti memorizzati.
	 * @return Artista[] Restituisce un oggetto ARTISTA corrispondente ad ogni artista memorizzato.
	 */
	public function get_all(): array;

	/**
	 * Aggiorna le informazioni di un artista esistente.
	 * @param Artista $artista contiene le informazioni da aggiornare e l'ID col quale trovare l'artista
	 * @return Artista|null
	 *                         Se l'artista con ID = $artista.ID esiste, e le sue informazioni attuali non
	 *                         corrispongono, questo viene aggiornato e la funzione restitusice un oggetto ARTISTA
	 *                         contenente le nuove informazioni.
	 *                         Se l'artista con ID = $artista.ID esiste ma le sue informazioni sono già come le si
	 *                         vuole, la funzione restitusice NULL.
	 *                         Se l'artista con ID = $artista.ID non esiste, la funzione restituisce NULL.
	 */
	public function update(Artista $artista): ?Artista;

	/**
	 * Rimuove l'artista con l'ID fornito.
	 * @param int $id è l'ID dell'artista da rimuovere
	 * @return bool Se viene cancellato un artista con ID = $id, la funzione restitusice TRUE, altrimenti FALSE.
	 */
	public function delete(int $id): bool;

}