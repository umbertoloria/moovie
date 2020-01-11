<?php

class StubAccountDAO implements IAccountDAO {

	private $accounts = [];
	private $next_id = 1;

	private function cloneUtente(Utente $utente, $strict_id = null) {
		return new Utente($strict_id == null ? $utente->getID() : $strict_id, $utente->getNome(),
			$utente->getCognome(), $utente->getEmail(), $utente->getPassword(), $utente->isGestore());
	}

	public function exists(string $email): bool {
		foreach ($this->accounts as $account) {
			assert($account instanceof Utente);
			if ($account->getEmail() === $email)
				return true;
		}
		return false;
	}

	public function create(Utente $utente): ?Utente {
		if (!$this->exists($utente->getEmail())) {
			$clone = $this->cloneUtente($utente, $this->next_id++);
			$this->accounts[$clone->getID()] = $clone;
			return $this->cloneUtente($clone);
		} else
			return null;
	}

	public function get_from_id(int $id): ?Utente {
		if (isset($this->accounts[$id]))
			return $this->cloneUtente($this->accounts[$id]);
		else
			return null;
	}

	public function update(Utente $utente): ?Utente {
		if (isset($this->accounts[$utente->getID()])) {
			$real_utente = $this->accounts[$utente->getID()];
			assert($real_utente instanceof Utente);
			$real_utente->setPassword($utente->getPassword());
			return $utente;
		} else
			return null;
	}

	public function authenticate(string $email, string $password): ?Utente {
		foreach ($this->accounts as $account) {
			assert($account instanceof Utente);
			if ($account->getEmail() === $email and $account->getPassword() === $password)
				return $this->cloneUtente($account);
		}
		return null;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		return [];
	}

	public function delete(int $id): bool {
		if (isset($this->accounts[$id])) {
			unset($this->accounts[$id]);
			return true;
		} else
			return false;
	}

}