<?php

class Saga
{

	/** @var int */
	private $id;
	/** @var string */
	private $titolo;

	public function __construct(int $id, string $titolo)
	{
		$this->id = $id;
		$this->titolo = $titolo;
	}

	public function getID(): int
	{
		return $this->id;
	}

	public function getTitolo(): string
	{
		return $this->titolo;
	}

}