<?php

class StubGiudizioDAO implements IGiudizioDAO {

	/** @type Giudizio[] */
	private $giudizi = [];

	private function deepCopy(Giudizio $giudizio, bool $now_as_timestamp) {
		return new Giudizio($giudizio->getUtente(), $giudizio->getFilm(), $giudizio->getVoto(),
			$now_as_timestamp ? date("Y-m-d H:i:s") : $giudizio->getTimestamp());
	}

	public function create(Giudizio $giudizio): bool {
		foreach ($this->giudizi as $giud) {
			if ($giud->getFilm() == $giudizio->getFilm() and $giud->getUtente() == $giudizio->getUtente())
				return false;
		}
		$this->giudizi[] = $this->deepCopy($giudizio, true);
		return true;
	}

	public function update(Giudizio $giudizio): bool {
		foreach ($this->giudizi as $giud) {
			if ($giud->getFilm() == $giudizio->getFilm() and $giud->getUtente() == $giudizio->getUtente()) {
				if ($giud->getVoto() != $giudizio->getVoto()) {
					$giud->setVoto($giudizio->getVoto());
					return true;
				} else {
					// perché in effetti non ho aggiornato niente
					return false;
				}
			}
		}
		return false;
	}

	public function delete(Giudizio $giudizio): bool {
		foreach ($this->giudizi as $key => $giud) {
			if ($giud->getFilm() == $giudizio->getFilm() and $giud->getUtente() == $giudizio->getUtente()) {
				unset($this->giudizi[$key]);
				return true;
			}
		}
		return false;
	}

	/** @inheritDoc */
	public function findByUtenti(array $utenti_ids): array {
		$res = [];
		foreach ($this->giudizi as $giud)
			if (in_array($giud->getUtente(), $utenti_ids))
				$res[] = $this->deepCopy($giud, false);
		return $res;
	}

	public function findByUtenteAndFilm(int $utente_id, int $film_id): ?Giudizio {
		foreach ($this->giudizi as $giud)
			if ($giud->getUtente() == $utente_id and $giud->getFilm() == $film_id)
				return $this->deepCopy($giud, false);
		return null;
	}

	public function exists(int $utente_id, int $film_id): bool {
		foreach ($this->giudizi as $giud)
			if ($giud->getUtente() == $utente_id and $giud->getFilm() == $film_id)
				return true;
		return false;
	}

}