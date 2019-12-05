<?php

/**
 * Regia è un'associazione tra un Film e un Artista.
 * Ogni artista può curare la regia di più film. La regia di ogni film deve essere curata da almeno un artista.
 *
 * RegiaManager permette di conoscere:
 * * in quali film un artista ha partecipato alla regia
 * * quali artisti hanno curato la regia di un film.
 *
 * @see    Film, FilmManager, Artista, ArtistaManager
 * @author Umberto Loria
 */
class RegiaManager {

	// AGGIUNTE

	/**
	 * Dato un ArtistaID, restituisce i FilmID le cui regie sono state curate anche dall'artista.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_films_from_artista(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film FROM regie WHERE regista = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $r["film"];
		return $res;
	}

	/**
	 * Dato un FilmID, restituisce gli ArtistiID che hanno curato la sua regia.
	 * @param int $id
	 * @return int[]
	 */
	public static function get_artisti_from_film(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT regista FROM regie WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $r["regista"];
		return $res;
	}

}