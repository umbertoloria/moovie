<?php

class GenereManager {

	// AGGIUNTE

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

}