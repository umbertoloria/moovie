<?php

interface IAccountDAO {

	public function exists(string $email): bool;

	public function create(Utente $utente): ?Utente;

	public function get_from_id(int $id): ?Utente;

	public function update(Utente $utente): ?Utente;

	public function authenticate(string $email, string $password): ?Utente;

	/**
	 * @param string $fulltext
	 * @return Utente[]
	 */
	public function search(string $fulltext): array;

	public function delete(int $id): bool;

}