<?php

class StubGenereDAO implements IGenereDAO {

	/** @type Genere[] */
	private $generi = [];
	private $next_id = 1;

	/** @type int[][] */
	private $fhg = [];

	private function deepCopy(Genere $genere, $strict_id = null) {
		return new Genere($strict_id == null ? $genere->getID() : $strict_id, $genere->getNome());
	}

	public function findByID(int $id): ?Genere {
		if (isset($this->generi[$id]))
			return $this->deepCopy($this->generi[$id]);
		else
			return null;
	}

	public function findGeneriByFilm(int $film_id): array {
		$res = [];
		if (isset($this->fhg[$film_id]))
			foreach ($this->fhg[$film_id] as $gid)
				$res[] = $gid;
		return $res;
	}

	public function findFilmsByGenere(int $id): array {
		$res = [];
		foreach ($this->fhg as $fid => $gids)
			if (in_array($id, $gids))
				$res[] = $fid;
		return $res;
	}

	public function getAll(): array {
		$res = [];
		foreach ($this->generi as $genere)
			$res[] = $this->deepCopy($genere);
		return $res;
	}

	public function setOnly(int $film_id, array $assign_genere_ids): bool {
		// non devono esserci doppioni
		for ($i = 0; $i < count($assign_genere_ids) - 1; $i++)
			for ($j = $i + 1; $j < count($assign_genere_ids); $j++)
				if ($assign_genere_ids[$i] == $assign_genere_ids[$j])
					return false;
		// devono esistere tutti i generi
		foreach ($assign_genere_ids as $gid)
			if (!isset($this->generi[$gid]))
				return false;
		// $this->fhg[$film_id] deve contenere una copia di $assign_genere_ids
		$this->fhg[$film_id] = [];
		foreach ($assign_genere_ids as $gid)
			$this->fhg[$film_id][] = $gid;
		return true;
	}

	public function create(Genere $genere): ?Genere {
		if (!$this->exists($genere->getNome())) {
			$clone = $this->deepCopy($genere, $this->next_id++);
			$this->generi[$clone->getID()] = $clone;
			return $this->deepCopy($clone);
		} else {
			return null;
		}
	}

	public function update(Genere $genere): ?Genere {
		if (isset($this->generi[$genere->getID()])) {
			$real_genere = $this->generi[$genere->getID()];
			$real_genere->setNome($genere->getNome());
			return $genere;
		} else {
			return null;
		}
	}

	public function delete(int $id): bool {
		if (isset($this->generi[$id])) {
			unset($this->generi[$id]);
			return true;
		} else
			return false;
	}

	public function exists(string $nome): bool {
		foreach ($this->generi as $genere)
			if ($genere->getNome() === $nome)
				return true;
		return false;
	}

}
