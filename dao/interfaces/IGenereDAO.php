<?php

interface IGenereDAO {

	/**
	 * Restituisce le informazioni del genere con l'ID fornito.
	 * @param int $id      è l'ID del genere da prelevare
	 * @return Genere|null Se esiste un genere con ID = $id, allora la funzione restituisce un oggetto GENERE
	 *                     contenente le sue informazioni. Altrimenti, la funzione restituisce NULL.
	 */
	public function findByID(int $id): ?Genere;

	/**
	 * Restituisce gli ID dei generi associati ad un film fornito.
	 * @param int $film_id è l'ID del film
	 * @return int[] Restituisce gli ID di tutti i generi associati al film con ID = $id.
	 */
	public function findGeneriByFilm(int $film_id): array;

	/**
	 * Restituisce gli ID dei film del genere fornito.
	 * @param int $id è l'ID del genere
	 * @return int[] Restituisce gli ID di tutti i film associati al genere con ID = $id.
	 */
	public function findFilmsByGenere(int $id): array;

	/**
	 * Preleva tutti i generi memorizzati.
	 * @return Genere[] La funzione restituisce un oggetto GENERE contenente le informazioni di ogni genere.
	 */
	public function getAll(): array;

	/**
	 * Associa ad un film solo i generi forniti, disassociandolo con tutti gli altri.
	 * @param int   $film_id           è l'ID del film
	 * @param array $assign_genere_ids contiene gli ID dei generi da associare esclusivamente
	 * @return bool Dopo l'esecuzione della funzione, il film con ID = $film_id sarà associato esclusivamente ai generi
	 *                                 i cui ID sono presenti in $assign_genere_ids.
	 */
	public function setOnly(int $film_id, array $assign_genere_ids): bool;

	/**
	 * Aggiunge un nuovo genere con il nome fornito.
	 * @param Genere $genere contiene i dati da inserire (nome)
	 * @return Genere|null La funzione crea un genere con le informazioni fornite. Poi restituisce un oggetto GENERE
	 *                       contenente le informazioni del nuovo genere. Se la funzione non riesce a salvare le
	 *                       informazioni, restituisce NULL.
	 */
	public function create(Genere $genere): ?Genere;

	/**
	 * Aggiorna le informazioni di un genere esistente.
	 * @param Genere $genere   contiene le informazioni da aggiornare e l'ID col quale trovare il genere
	 * @return Genere|null
	 *                         Se il genere con ID = $genere.ID esiste, le sue informazioni vengono aggiornate e la
	 *                         funzione restitusice un oggetto GENERE contenente queste nuove informazioni.
	 *                         Se il genere con ID = $genere.ID non esiste, la funzione restituisce NULL.
	 */
	public function update(Genere $genere): ?Genere;

	/**
	 * Rimuove il genere con l'ID fornito.
	 * @param int $id è l'ID del genere da rimuovere
	 * @return bool Se viene cancellato un genere con ID = $id, la funzione restitusice TRUE, altrimenti FALSE.
	 */
	public function delete(int $id): bool;

	/**
	 * Indica se esiste un genere chiamato con il nome fornito.
	 * @param string $nome è il nome da cercare
	 * @return bool Se esiste un GENERE con NOME = $nome la funzione restituisce TRUE. Altrimenti FALSE.
	 */
	public function exists(string $nome): bool;

}