<?php

class StubAmiciziaDAO implements IAmiciziaDAO {

	/** @type Amicizia[] */
	private $amicizie = [];

	public function getFriendships(int $user_id): array {
		$res = [];
		foreach ($this->amicizie as $amicizia)
			if (($amicizia->getUtenteFrom() === $user_id || $amicizia->getUtenteTo() === $user_id)
				and !is_null($amicizia->getTimestampAccettazione()))
				$res[] = $amicizia;
		return $res;
	}

	public function getRequests(int $user_id): array {
		$res = [];
		foreach ($this->amicizie as $amicizia)
			if (($amicizia->getUtenteFrom() === $user_id || $amicizia->getUtenteTo() === $user_id)
				and is_null($amicizia->getTimestampAccettazione()))
				$res[] = $amicizia;
		return $res;
	}

	public function existsSomethingBetween(int $user1, int $user2): bool {
		foreach ($this->amicizie as $amicizia)
			if (($amicizia->getUtenteFrom() === $user1 and $amicizia->getUtenteTo() === $user2)
				or ($amicizia->getUtenteFrom() === $user2 and $amicizia->getUtenteTo() === $user1))
				return true;
		return false;
	}

	public function requestFriendshipFromTo(int $user_from, int $user_to): bool {
		if ($user_from == $user_to)
			return false;
		if ($this->existsSomethingBetween($user_from, $user_to))
			return false;
		$this->amicizie[] = new Amicizia($user_from, $user_to, date("Y-m-d H:i:s"), null);
		return true;
	}

	public function existsRequestFromTo(int $user_from, int $user_to): bool {
		foreach ($this->amicizie as $request)
			if ($request->getUtenteFrom() === $user_from and $request->getUtenteTo() === $user_to and is_null($request->getTimestampAccettazione()))
				return true;
		return false;
	}

	public function removeFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		foreach ($this->amicizie as $key => $amicizia) {
			if ($amicizia->getUtenteFrom() === $user_from and $amicizia->getUtenteTo() === $user_to
				and is_null($amicizia->getTimestampAccettazione())) {
				unset($this->amicizie[$key]);
				return true;
			}
		}
		return false;
	}

	public function acceptFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		foreach ($this->amicizie as $key => $amicizia) {
			if ($amicizia->getUtenteFrom() === $user_from and $amicizia->getUtenteTo() === $user_to
				and is_null($amicizia->getTimestampAccettazione())) {
				$timestamp_richiesta = $amicizia->getTimestampRichiesta();
				unset($this->amicizie[$key]);
				$this->amicizie[] = new Amicizia($user_from, $user_to, $timestamp_richiesta, date("Y-m-d H:i:s"));
				return true;
			}
		}
		return false;
	}

	public function refuseFriendshipRequestFromTo(int $user_from, int $user_to): bool {
		foreach ($this->amicizie as $key => $amicizia) {
			if ($amicizia->getUtenteFrom() === $user_from and $amicizia->getUtenteTo() === $user_to
				and is_null($amicizia->getTimestampAccettazione())) {
				unset($this->amicizie[$key]);
				return true;
			}
		}
		return false;
	}

	public function existsFriendshipBetween(int $user1, int $user2): bool {
		foreach ($this->amicizie as $amicizia)
			if (!is_null($amicizia->getTimestampAccettazione()) and
				(($amicizia->getUtenteFrom() === $user1 and $amicizia->getUtenteTo() === $user2)
					or ($amicizia->getUtenteFrom() === $user2 and $amicizia->getUtenteTo() === $user1)))
				return true;
		return false;
	}

	public function removeFriendshipBetween(int $user1, int $user2): bool {
		foreach ($this->amicizie as $key => $amicizia) {
			if (!is_null($amicizia->getTimestampAccettazione()) and
				(($amicizia->getUtenteFrom() === $user1 and $amicizia->getUtenteTo() === $user2)
					or ($amicizia->getUtenteFrom() === $user2 and $amicizia->getUtenteTo() === $user1))) {
				unset($this->amicizie[$key]);
				return true;
			}
		}
		return false;
	}

}

