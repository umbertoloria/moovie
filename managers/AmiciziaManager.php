<?php

class AmiciziaManager {

	/** @return Amicizia[] */
	public static function getFriendships(int $user_id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente_from, utente_to, timestamp_richiesta, timestamp_accettazione
				FROM amicizie WHERE timestamp_accettazione IS NOT NULL AND (utente_from = ? OR utente_to = ?)");
		if ($stmt->execute([$user_id, $user_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Amicizia($r["utente_from"], $r["utente_to"], $r["timestamp_richiesta"], $r["timestamp_accettazione"]);
		return $res;
	}

	/** @return Amicizia[] */
	public static function getRequests(int $user_id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente_from, utente_to, timestamp_richiesta
				FROM amicizie WHERE timestamp_accettazione IS NULL AND (utente_from = ? OR utente_to = ?)");
		if ($stmt->execute([$user_id, $user_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Amicizia($r["utente_from"], $r["utente_to"], $r["timestamp_richiesta"], null);
		return $res;
	}

	public static function existsSomethingBetween(int $user1, int $user2): bool {
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE ((utente_from = ? AND utente_to = ?)
				OR (utente_from = ? AND utente_to = ?))");
		return $stmt->execute([$user1, $user2, $user2, $user1]) and $stmt->rowCount() > 0;
	}

	public static function requestFriendshipFromTo(int $user_from, int $user_to): bool {
		if ($user_from == $user_to)
			return false;
		$stmt = DB::stmt("INSERT INTO amicizie SET utente_from = ?, utente_to = ?");
		return $stmt->execute([$user_from, $user_to]);
	}

	public static function existsRequestFromTo(int $user_from, int $user_to): bool {
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE utente_from = ? AND utente_to = ? AND timestamp_accettazione IS NULL");
		return $stmt->execute([$user_from, $user_to]) and $stmt->rowCount() === 1;
	}

	public static function removeFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		$stmt = DB::stmt("DELETE FROM amicizie WHERE utente_from = ? AND utente_to = ?");
		return $stmt->execute([$user_from, $user_to]) and $stmt->rowCount() === 1;
	}

	public static function acceptFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		$stmt = DB::stmt(
			"UPDATE amicizie SET timestamp_accettazione = current_timestamp WHERE utente_from = ? AND utente_to = ?");
		return $stmt->execute([$user_from, $user_to]) and $stmt->rowCount() === 1;
	}

	public static function refuseFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		$stmt = DB::stmt(
			"DELETE FROM amicizie WHERE utente_from = ? AND utente_to = ? AND timestamp_accettazione IS NULL");
		return $stmt->execute([$user_from, $user_to]) and $stmt->rowCount() === 1;
	}

	public static function existsFriendshipBetween(int $user1, int $user2) {
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE timestamp_accettazione IS NOT NULL
				AND ((utente_from = ? AND utente_to = ?) OR (utente_from = ? AND utente_to = ?))");
		$stmt->execute([$user1, $user2, $user2, $user1]);
		return $stmt->rowCount() === 1;
	}

	public static function removeFriendshipBetween(int $user1, int $user2): bool {
		$stmt = DB::stmt(
			"DELETE FROM amicizie WHERE timestamp_accettazione IS NOT NULL
				AND (utente_from = ? AND utente_to = ?) OR (utente_from = ? AND utente_to = ?)");
		return $stmt->execute([$user1, $user2, $user2, $user1]) and $stmt->rowCount() === 1;
	}

}