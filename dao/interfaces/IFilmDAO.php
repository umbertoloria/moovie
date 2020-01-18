<?php

interface IFilmDAO {

	/**
	 * Restituisce le informazioni del film con l'ID fornito.
	 * @param int $id    è l'ID del film da prelevare
	 * @return Film|null Se esiste un film con ID = $id, allora la funzione restituisce un oggetto FILM contenente le
	 *                   sue informazioni. Altrimenti, la funzione restituisce NULL.
	 */
	public function get_from_id(int $id): ?Film;

	/**
	 * Ricerca i film con campi NOME e DESCRIZIONE correlati al parametro FULLTEXT fornito.
	 * @param string $fulltext è il parametro FULLTEXT da cui cercare similitudini
	 * @return Film[] La funzione restituisce tutti i film con informazioni correlate al parametro $fulltext.
	 */
	public function search(string $fulltext): array;

	/**
	 * Preleva i film più in linea con le preferenze cinematografiche dell'utente con l'ID fornito.
	 * @param int $utente_id è l'ID dell'utente
	 * @return Film[] La funzione restituisce tutti i film in linea con le preferenze cinematografiche dell'utente con
	 *                       ID = $utente_id e di cui quest'ultimo non ha mai salvato un giudizio.
	 */
	public function suggest_me(int $utente_id): array;

	/**
	 * Preleva l'immagine del film con l'ID fornito.
	 * @param int $id è l'ID del film
	 * @return mixed Se esiste un film con ID = $id, la funzione restituisce la sua immagine. Altrimenti NULL.
	 */
	public function downloadCopertina(int $id);

	/**
	 * Memorizza l'immagine del film con l'ID fornito.
	 * @param int   $id            è l'ID del film
	 * @param mixed $copertina_bin è l'immagine da memorizzare
	 * @return bool Se esiste un film con ID = $id, la sua immagine diventa $copertina_bin e la funzione restituisce
	 *                             TRUE. Altrimenti FALSE.
	 */
	public function uploadCopertina(int $id, $copertina_bin): bool;

	/**
	 * Preleva i film meglio giudicati dalla community degli utenti.
	 * @return Film[] La funzione restituisce i 50 film con media più alta dei voti dei giudizi.
	 */
	public function getClassifica(): array;

	/**
	 * Aggiunge un nuovo film con le informazioni fornite.
	 * @param Film  $film          contiene i dati da inserire (titolo, durata, anno, descrizione)
	 * @param mixed $copertina_bin contiene l'immagine da inserire
	 * @return Film|null La funzione crea un film con l'immagine e le informazioni fornite. Poi restituisce un
	 *                             oggetto FILM contenente le informazioni del nuovo film.
	 *                             Se la funzione non riesce a salvare le informazioni, restituisce NULL.
	 */
	public function create(Film $film, $copertina_bin): ?Film;

	/**
	 * Aggiorna le informazioni di un film esistente.
	 * @param Film $film       contiene le informazioni da aggiornare e l'ID col quale trovare il film
	 * @return Film|null
	 *                         Se il film con ID = $film.ID esiste, le sue informazioni vengono modificate e la
	 *                         funzione restitusice un oggetto FILM contenente le nuove informazioni.
	 *                         Se il film con ID = $film.ID non esiste, la funzione restituisce NULL.
	 */
	public function update(Film $film): ?Film;

	/**
	 * Rimuove il film con l'ID fornito.
	 * @param int $id è l'ID del film da rimuovere
	 * @return bool Se viene cancellato un film con ID = $id, la funzione restitusice TRUE, altrimenti FALSE.
	 */
	public function delete(int $id): bool;

}