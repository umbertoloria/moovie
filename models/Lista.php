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

	/** @param int[] $films */
	public function __construct(int $id, int $proprietario, string $nome, string $visibilità) {
		assert($visibilità === "tutti" or $visibilità === "amici" or $visibilità === "solo_tu");
		$this->id = $id;
		$this->proprietario = $proprietario;
		$this->nome = $nome;
		$this->visibilità = $visibilità;
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

	public function setNome(string $nome) {
		$this->nome = $nome;
	}

	public function getVisibilità(): string {
		return $this->visibilità;
	}

	public function setVisibilità(string $visibilità) {
		assert($visibilità === "tutti" or $visibilità === "amici" or $visibilità === "solo_tu");
		$this->visibilità = $visibilità;
	}

}