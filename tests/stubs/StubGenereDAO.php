<?php

class StubGenereDAO implements IGenereDAO {

    private $generi = [];
    private $next_id = 1;

    private function cloneGenere(Genere $genere, $strict_id = null) {
        return new Genere($strict_id == null ? $genere->getID() : $strict_id, $genere->getNome());
    }

    public function existsGenere(string $nome): bool {
        foreach ($this->generi as $gen) {
            assert($gen instanceof Genere);
            if ($gen->getNome() === $nome)
                return true;
        }
        return false;
    }

    public function create(Genere $genere): ?Genere
    {
        if(!$this->existsGenere($genere->getNome())){
            $clone = $this->cloneGenere($genere, $this->next_id++);
            $this->generi[$clone->getID()] = $clone;
            return $this->cloneGenere($clone);
        }else{
            return null;
        }
        return new Genere(0, $genere->getNome());
    }

    public function update(Genere $genere): ?Genere
    {
        if(isset($this->generi[$genere->getID()])){
            $real_genere = $this->generi[$genere->getID()];
            assert($real_genere instanceof Genere);
            $real_genere->setNome($genere->getNome());
            return $genere;
        }else{
            return null;
        }
    }

    public function delete(int $id): bool
    {
        if(isset($this->generi[$id])){
            unset($this->generi[$id]);
            return true;
        }else
            return false;
    }

    public function get_from_id(int $id): ?Genere
    {
        if (isset($this->generi[$id]))
            return $this->cloneGenere($this->generi[$id], $id);
        else
            return null;
    }

    public function get_all(): array
    {
        return $this->generi;
    }

    public function exists(string $nome): bool
    {
        // TODO: Implement exists() method.
    }

    public function get_films_from_genere(int $id): array
    {
        // TODO: Implement get_films_from_genere() method.
    }

    public function get_from_film(int $film_id): array
    {
        // TODO: Implement get_from_film() method.
    }

    public function get_generi_from_film(int $id): array
    {
        // TODO: Implement get_generi_from_film() method.
    }

    public function set_only(int $film_id, array $assign_genere_ids): bool
    {
        // TODO: Implement set_only() method.
    }

    /**
     * @return array
     */
    public function getGenere(): array
    {
        return $this->genere;
    }

    /**
     * @return int
     */
    public function getNextId(): int
    {
        return $this->next_id;
    }

    /**
     * @param array $genere
     */
    public function setGenere(array $genere): void
    {
        $this->genere = $genere;
    }

    /**
     * @param int $next_id
     */
    public function setNextId(int $next_id): void
    {
        $this->next_id = $next_id;
    }

}
