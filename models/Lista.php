<?php

/** @author Umberto Loria */
class Lista {

	/** @var int */
	private $id;
	/** @var int */
	private $proprietario;
	/** @var string */
	private $nome;
	/** @var string */
	private $visibilità;
	/** @var int[] */
	private $films;

	/** @param int[] $films */
	public function __construct(int $id, int $proprietario, string $nome, string $visibilità, array $films) {
		$this->id = $id;
		$this->proprietario = $proprietario;
		$this->nome = $nome;
		$this->visibilità = $visibilità;
		$this->films = $films;
	}

	public function getID(): int {
		return $this->id;
	}

	public function getProprietario(): int {
		return $this->proprietario;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function getVisibilità(): string {
		return $this->visibilità;
	}

	/** @return int[] */
	public function getFilms(): array {
		return $this->films;
	}

}