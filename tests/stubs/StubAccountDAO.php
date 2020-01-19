<?php

class StubAccountDAO implements IAccountDAO {

	/** @type Utente[] */
	private $accounts = [];
	private $next_id = 1;

	private function deepCopy(Utente $utente, $strict_id = null) {
		return new Utente($strict_id == null ? $utente->getID() : $strict_id, $utente->getNome(),
			$utente->getCognome(), $utente->getEmail(), $utente->getPassword(), $utente->isGestore());
	}

	public function exists(string $email): bool {
		foreach ($this->accounts as $account)
			if ($account->getEmail() === $email)
				return true;
		return false;
	}

	public function create(Utente $utente): ?Utente {
		if (!$this->exists($utente->getEmail())) {
			$clone = $this->deepCopy($utente, $this->next_id++);
			$this->accounts[$clone->getID()] = $clone;
			return $this->deepCopy($clone);
		} else
			return null;
	}

	public function findByID(int $id): ?Utente {
		if (isset($this->accounts[$id]))
			return $this->deepCopy($this->accounts[$id]);
		else
			return null;
	}

	public function update(Utente $utente): ?Utente {
		if (isset($this->accounts[$utente->getID()])) {
			$real_utente = $this->accounts[$utente->getID()];
			$real_utente->setPassword($utente->getPassword());
			return $utente;
		} else
			return null;
	}

	public function authenticate(string $email, string $password): ?Utente {
		foreach ($this->accounts as $account)
			if ($account->getEmail() === $email and $account->getPassword() === $password)
				return $this->deepCopy($account);
		return null;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		$words = explode(" ", strtolower($fulltext));
		$scores = [];
		foreach ($this->accounts as $account) {
			$possible_matches = explode(" ",
				strtolower($account->getNome() . " " . $account->getCognome()));
			$score = 0;
			foreach ($possible_matches as $possible_match)
				if (in_array($possible_match, $words))
					$score++;
			if ($score > 0)
				$scores[$account->getID()] = $score;
		}
		// map_scores = [
		//        1 => [uid1, uid7, uid5],
		//        2 => [uid4, uid6],
		//        4 => [uid2],
		//        7 => [uid3],
		//]
		$map_scores = [];
		foreach ($scores as $uid => $score) {
			if (isset($map_scores[$score]))
				$map_scores[$score][] = $uid;
			else
				$map_scores[$score] = [$uid];
		}
		krsort($map_scores);
		$res = [];
		foreach ($map_scores as $score => $uids)
			foreach ($uids as $uid)
				$res[] = $this->findByID($uid);
		return $res;
	}

	public function delete(int $id): bool {
		if (isset($this->accounts[$id])) {
			unset($this->accounts[$id]);
			return true;
		} else
			return false;
	}

}