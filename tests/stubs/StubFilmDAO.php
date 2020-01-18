<?php

class StubFilmDAO implements IFilmDAO {

	/** @type Film[] */
	private $films = [];
	private $copertine = [];
	private $next_id = 1;

	private function deepCopy(Film $film, $strict_id = null) {
		return new Film($strict_id == null ? $film->getID() : $strict_id, $film->getTitolo(),
			$film->getDurata(), $film->getAnno(), $film->getDescrizione());
	}

	public function get_from_id(int $id): ?Film {
		if (isset($this->films[$id]))
			return $this->deepCopy($this->films[$id]);
		else
			return null;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		$words = explode(" ", strtolower($fulltext));
		$scores = [];
		foreach ($this->films as $film) {
			$possible_matches = explode(" ",
				strtolower($film->getTitolo() . " " . $film->getDescrizione()));
			$score = 0;
			foreach ($possible_matches as $possible_match)
				if (in_array($possible_match, $words))
					$score++;
			if ($score > 0)
				$scores[$film->getID()] = $score;
		}
		// map_scores = [
		//        1 => [fid1, fid7, fid5],
		//        2 => [fid4, fid6],
		//        4 => [fid2],
		//        7 => [fid3],
		//]
		$map_scores = [];
		foreach ($scores as $fid => $score) {
			if (isset($map_scores[$score]))
				$map_scores[$score][] = $fid;
			else
				$map_scores[$score] = [$fid];
		}
		krsort($map_scores);
		$res = [];
		foreach ($map_scores as $score => $fids)
			foreach ($fids as $fid)
				$res[] = $this->get_from_id($fid);
		return $res;
	}

	/** @inheritDoc */
	public function suggest_me(int $utente_id): array {
		return [];
	}

	public function downloadCopertina(int $id) {
		if (isset($this->copertine[$id]))
			return $this->copertine[$id];
		else
			return null;
	}

	public function uploadCopertina(int $id, $copertina_bin): bool {
		if (isset($this->films[$id]) and isset($this->copertine[$id])) {
			$this->copertine[$id] = $copertina_bin;
			return true;
		} else
			return false;
	}

	/** @inheritDoc */
	public function getClassifica(): array {
		return [];
	}

	public function create(Film $film, $copertina_bin): ?Film {
		$clone = $this->deepCopy($film, $this->next_id++);
		$this->films[$clone->getID()] = $clone;
		$this->copertine[$clone->getID()] = $copertina_bin;
		return $this->deepCopy($clone);
	}

	public function update(Film $film): ?Film {
		if (isset($this->films[$film->getID()])) {
			$real_film = $this->films[$film->getID()];
			$real_film->setTitolo($film->getTitolo());
			$real_film->setDurata($film->getDurata());
			$real_film->setAnno($film->getAnno());
			$real_film->setDescrizione($film->getDescrizione());
			return $this->deepCopy($real_film);
		} else
			return null;
	}

	public function delete(int $id): bool {
		if (isset($this->films[$id])) {
			unset($this->films[$id]);
			return true;
		} else
			return false;
	}

}