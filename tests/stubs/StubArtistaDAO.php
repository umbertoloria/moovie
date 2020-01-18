<?php

class StubArtistaDAO implements IArtistaDAO {

	/** @type Artista[] */
	private $artisti = [];
	private $facce = [];
	private $next_id = 1;

	private function deepCopy(Artista $artista, $strict_id = null) {
		return new Artista($strict_id == null ? $artista->getID() : $strict_id, $artista->getNome(),
			$artista->getNascita(), $artista->getDescrizione());
	}

	public function get_from_id(int $id): ?Artista {
		if (isset($this->artisti[$id]))
			return $this->deepCopy($this->artisti[$id]);
		else
			return null;
	}

	public function downloadFaccia(int $id) {
		if (isset($this->facce[$id]))
			return $this->facce[$id];
		else
			return null;
	}

	public function uploadFaccia(int $id, $faccia_bin): bool {
		if (isset($this->artisti[$id]) and isset($this->facce[$id])) {
			$this->facce[$id] = $faccia_bin;
			return true;
		} else
			return false;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		$words = explode(" ", strtolower($fulltext));
		$scores = [];
		foreach ($this->artisti as $artista) {
			$possible_matches = explode(" ",
				strtolower($artista->getNome() . " " . $artista->getDescrizione()));
			$score = 0;
			foreach ($possible_matches as $possible_match)
				if (in_array($possible_match, $words))
					$score++;
			if ($score > 0)
				$scores[$artista->getID()] = $score;
		}
		// map_scores = [
		//        1 => [aid1, aid7, aid5],
		//        2 => [aid4, aid6],
		//        4 => [aid2],
		//        7 => [aid3],
		//]
		$map_scores = [];
		foreach ($scores as $aid => $score) {
			if (isset($map_scores[$score]))
				$map_scores[$score][] = $aid;
			else
				$map_scores[$score] = [$aid];
		}
		krsort($map_scores);
		$res = [];
		foreach ($map_scores as $score => $aids)
			foreach ($aids as $aid)
				$res[] = $this->get_from_id($aid);
		return $res;
	}

	public function create(Artista $artista, $faccia_bin): ?Artista {
		$clone = $this->deepCopy($artista, $this->next_id++);
		$this->artisti[$clone->getID()] = $clone;
		$this->facce[$clone->getID()] = $faccia_bin;
		return $this->deepCopy($clone);
	}

	/** @inheritDoc */
	public function get_all(): array {
		$res = [];
		foreach ($this->artisti as $artista)
			$res[] = $this->deepCopy($artista);
		return $res;
	}

	public function update(Artista $artista): ?Artista {
		if (isset($this->artisti[$artista->getID()])) {
			$real_artista = $this->artisti[$artista->getID()];
			$real_artista->setNome($artista->getNome());
			$real_artista->setNascita($artista->getNascita());
			$real_artista->setDescrizione($artista->getDescrizione());
			return $this->deepCopy($real_artista);
		} else
			return null;
	}

	public function delete(int $id): bool {
		if (isset($this->artisti[$id])) {
			unset($this->artisti[$id]);
			return true;
		} else
			return false;
	}

}