<?php

class RegiaManager {

	// AGGIUNTE

	public static function doRetrieveByRegista(int $id) {
		$res = [];
		$stmt = DB::stmt("SELECT film, regista FROM regie WHERE regista = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Regia($r["film"], $r["regista"]);
		return $res;
	}

	public static function doRetrieveByFilm(int $id) {
		$res = [];
		$stmt = DB::stmt("SELECT film, regista FROM regie WHERE film = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Regia($r["film"], $r["regista"]);
		return $res;
	}

}