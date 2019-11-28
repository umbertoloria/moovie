<?php

class RecitazioneManager {

	// AGGIUNTE

	/** @return Recitazione[] */
	public static function doRetrieveByAttore(int $id): array {
		$res = [];
		$stmt = DB::stmt("SELECT film, attore, personaggio FROM recitazioni WHERE attore = ?");
		if ($stmt->execute([$id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Recitazione($r["film"], $r["attore"], $r["personaggio"]);
		return $res;
	}

}