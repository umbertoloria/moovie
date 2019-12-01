<?php

/**
 * Ogni film può avere più generi, e ogni genere può appartenere a più film.
 *
 * GenereManager permette di:
 * * prelevare un genere
 * * prelevare tutti i generi di un film
 * * conoscere solo gli id di tutti i generi di un film
 *
 * @see    Genere
 * @author Umberto Loria
 */
class GenereManager {

	// AGGIUNTE

	public static function doRetrieveByID(int $id) {
		$stmt = DB::stmt("SELECT id, nome FROM generi WHERE id = ?");
		if ($stmt->execute([$id]) && $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Genere($r["id"], $r["nome"]);
		else
			return null;
	}

	/** @return Genere[] */
	public static function doRetrieveByFilm(int $id) {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome
				FROM film_has_genere
				    JOIN generi
				        ON film_has_genere.genere = generi.id
				WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Genere($r["id"], $r["nome"]);
		return $res;
	}

	/**
	 * Dato un FilmID, restituisce i GeneriID del film
	 * @param int $id
	 * @return int[]
	 */
	public static function get_generi_from_film(int $id) {
		$res = [];
		$stmt = DB::stmt("SELECT genere FROM film_has_genere WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $r["genere"];
		return $res;
	}

}