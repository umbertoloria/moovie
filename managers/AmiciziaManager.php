<?php

class AmiciziaManager {

	// AGGIUNTE

	public static function doRetrieveByFromAndTo(int $user_from, int $user_to): ?Amicizia {
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

	/** @return Amicizia[] */
	public static function getFriendships(int $user_id): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT utente_from, utente_to, timestamp_richiesta, timestamp_accettazione
				FROM amicizie WHERE timestamp_accettazione IS NOT NULL AND (utente_from = ? OR utente_to = ?)");
		if ($stmt->execute([$user_id, $user_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Amicizia(
					$r["utente_from"],
					$r["utente_to"],
					$r["timestamp_richiesta"],
					$r["timestamp_accettazione"]
				);
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
				$res[] = new Amicizia(
					$r["utente_from"],
					$r["utente_to"],
					$r["timestamp_richiesta"],
					null
				);
		return $res;
	}

	public static function existsSomethingBetween(int $user1, int $user2): bool {
		$stmt = DB::stmt(
			"SELECT * FROM amicizie WHERE ((utente_from = ? AND utente_to = ?)
				OR (utente_from = ? AND utente_to = ?))");
		return $stmt->execute([$user1, $user2, $user2, $user1]) and $stmt->rowCount() > 0;
	}

	public static function requestFriendshipFromTo(int $user_from, int $user_to): ?Amicizia {
		assert($user_from != $user_to);
		$stmt = DB::stmt("INSERT INTO amicizie SET utente_from = ?, utente_to = ?");
		if ($stmt->execute([$user_from, $user_to]))
			return self::doRetrieveByFromAndTo($user_from, $user_to);
		else
			return null;
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
		assert($user1 != $user2);
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

	// SUGGERIMENTI

	/** @param int[] $friend_to_suggest_ids */
	public static function suggest(int $user_id, string $film_id, array $friend_to_suggest_ids): bool {
		// TODO: Transazione
		// FIXME: Controlla se esiste questo film
		assert(!in_array($user_id, $friend_to_suggest_ids));
		foreach ($friend_to_suggest_ids as $friend_to_suggest_id)
			// FIXME: Spreco di memoria!
			assert(self::existsFriendshipBetween($user_id, $friend_to_suggest_id));

		$errors = [];
		foreach ($friend_to_suggest_ids as $friend_to_suggest_id) {
			$stmt = DB::stmt("INSERT INTO suggerimenti_film SET utente_from = ?, utente_to = ?, film = ?");
			if (!$stmt->execute([$user_id, $friend_to_suggest_id, $film_id]))
				$errors[] = "impossibile suggerire il film {$film_id} all'utente {$friend_to_suggest_id}";
		}

		var_dump($errors);

		return $errors === [];

	}

	/** @return SuggerimentoFilm[] */
	public static function getSuggestionsTo(int $user_id): array {
		$res = [];
		$stmt = DB::stmt("SELECT utente_from, utente_to, film, timestamp FROM suggerimenti_film WHERE utente_to = ?");
		if ($stmt->execute([$user_id]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new SuggerimentoFilm($r["utente_from"], $r["utente_to"], $r["film"], $r["timestamp"]);
		return $res;
	}

	public static function dropSuggestion(int $user_from, int $user_to, int $film_id): bool {
		$stmt = DB::stmt("DELETE FROM suggerimenti_film WHERE utente_from = ? AND utente_to = ? AND film = ?");
		return $stmt->execute([$user_from, $user_to, $film_id]) and $stmt->rowCount() === 1;
	}

	public static function existsSuggestion(int $user_from, int $user_to, int $film): bool {
		$stmt = DB::stmt("SELECT * FROM suggerimenti_film WHERE utente_from = ? AND utente_to = ? AND film = ?");
		return $stmt->execute([$user_from, $user_to, $film]) and $stmt->rowCount() === 1;
	}

}