<?php

class UtenteTest extends PHPUnit\Framework\TestCase {

	/** @beforeClass */
	public static function init() {
	}

	public function provider_users_to_create() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "provaprova"],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "riccia"],
		];
	}

	/** @dataProvider provider_users_to_create */
	public function testNewUsers($nome, $cognome, $email, $password) {
		$utente = Utente::register($nome, $cognome, $email, $password);
		$this->assertEquals($utente->getNome(), $nome);
		$this->assertEquals($utente->getCognome(), $cognome);
		$this->assertEquals($utente->getEmail(), $email);
		$this->assertEquals($utente->getPassword(), $password);
	}

	/** @dataProvider provider_users_to_create */
	public function testExistingUsers($nome, $cognome, $email, $password) {
		$this->assertNull(
			Utente::register($nome, $cognome, $email, $password)
		);
	}

	public function provider_emails_to_delete() {
		return [
			'mario rossi' => ["mario@rossi.lol"],
			'michelantonio' => ["mama@non.mama"],
		];
	}

	/** @dataProvider provider_emails_to_delete */
	public function testDeleteUsers($email) {
		$this->assertTrue(
			Utente::deleteByID(
				Utente::retrieveByEmail($email)->getID()
			)
		);
	}

}
