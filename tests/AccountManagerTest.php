<?php

class AccountManagerTest extends PHPUnit\Framework\TestCase {

	/** @beforeClass */
	public static function init() {
	}

	public function users_provider() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "provaprova", false],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "riccia", true],
		];
	}

	/** @dataProvider users_provider */
	public function testCreateUser($nome, $cognome, $email, $password, $isGestore) {
		$utente = new Utente(0, $nome, $cognome, $email, $password, $isGestore);
		if (!AccountManager::exists($email)) {
			$utente_salvato = AccountManager::create($utente);
			$this->assertNotNull($utente_salvato);
			$this->assertEquals($utente_salvato->getNome(), $utente->getNome());
			$this->assertEquals($utente_salvato->getCognome(), $utente->getCognome());
			$this->assertEquals($utente_salvato->getEmail(), $utente->getEmail());
			$this->assertEquals($utente_salvato->getPassword(), $utente->getPassword());
			$this->assertEquals($utente_salvato->isGestore(), $utente->isGestore());
			$this->assertTrue(AccountManager::delete($utente_salvato));
		} else {
			$utente_salvato = AccountManager::create($utente);
			$this->assertNull($utente_salvato);
		}
	}

}
