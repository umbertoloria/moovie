<?php

class AmiciziaManager {

	public static function request(int $user_from, int $user_to): ?Amicizia {
		$stmt = DB::stmt("INSERT INTO amicizie SET utente_from = ?, utente_to = ?");
		if ($stmt->execute([$user_from, $user_to]))
			return self::doRetrieveByFromAndTo($user_from, $user_to);
		else
			return null;
	}

	// AGGIUNTE

	public static function doRetrieveByFromAndTo($user_from, $user_to): ?Amicizia {
		$stmt = DB::stmt(
			"SELECT utente_from, utente_to, timestamp_richiesta, timestamp_accettazione
				FROM amicizie WHERE utente_from = ? AND utente_to = ?");
		if ($stmt->execute([$user_from, $user_to]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Amicizia(
				$r["utente_from"],
				$r["utente_to"],
				$r["timestamp_richiesta"],
				$r["timestamp_accettazione"]
			);
		else
			return null;
	}

	public static function existsRequestBetween(int $user1, int $user2) {
		assert($user1 != $user2);
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE
				(utente_from = ? AND utente_to = ?) OR (utente_from = ? AND utente_to = ?)");
		$stmt->execute([$user1, $user2, $user2, $user1]);
		return $stmt->rowCount() === 1;
	}

	public static function existsFriendshipBetween(int $user1, int $user2) {
		assert($user1 != $user2);
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE timestamp_accettazione IS NOT NULL AND
				((utente_from = ? AND utente_to = ?) OR (utente_from = ? AND utente_to = ?))");
		$stmt->execute([$user1, $user2, $user2, $user1]);
		return $stmt->rowCount() === 1;
	}

}