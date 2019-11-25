<?php

class ArtistaManager {

	public static function doRetrieveByID(int $id) {
		$stmt = DB::stmt(
			"SELECT id, nome, data_nascita, descrizione
				FROM artisti JOIN artisti_descrizioni
				    ON artisti.id = artisti_descrizioni.artista
				WHERE id = ?"
		);
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return new Artista(
				$r["id"],
				$r["nome"],
				$r["data_nascita"],
				$r["descrizione"]
			);
		} else {
			return null;
		}
	}

}