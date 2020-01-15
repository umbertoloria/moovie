<?php

include_once "../../php/database.php";
include_once "../../models/Utente.php";
include_once "../../dao/factories/AccountDAOFactory.php";
include_once "../../dao/interfaces/IAccountDAO.php";
include_once "../../dao/implementation/DBAccountDAO.php";
include_once "stubs/StubAccountDAO.php";

class AccountDAOTest extends PHPUnit\Framework\TestCase {

	/** @var IAccountDAO */
	private static $account_dao;
	/** @var Utente[] */
	private static $saves = [];

	/** @beforeClass */
	public static function init() {
		AccountDAOFactory::initTest();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
	}

//	protected function setUp(): void {
//	}

	private function realExistsTest($nome, $cognome, $email, $password, $isGestore) {
		$utente = new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore);

		$oracle = false;
		foreach (self::$saves as $save)
			if ($save->getEmail())
				$oracle = true;

		$result = self::$account_dao->exists($utente->getEmail());

		$this->assertEquals($result, $oracle);
	}

	private function utenti_uguali(Utente $utente1, Utente $utente2): bool {
		return $utente1->getNome() == $utente2->getNome() and
			$utente1->getCognome() == $utente2->getCognome() and
			$utente1->getEmail() == $utente2->getEmail() and
			$utente1->getPassword() == $utente2->getPassword() and
			$utente1->isGestore() == $utente2->isGestore();
	}

	public function create_and_retrieve_users_provider() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "provaprova", false],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "molise", true],
		];
	}

	/** @dataProvider create_and_retrieve_users_provider */
	public function testExistsBeforeCreation($nome, $cognome, $email, $password, $isGestore) {
		$this->realExistsTest($nome, $cognome, $email, sha1($password), $isGestore);
	}

	/** @dataProvider create_and_retrieve_users_provider */
	public function testCreateUser($nome, $cognome, $email, $password, $isGestore) {
		$utente = new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore);
		$utente_salvato = self::$account_dao->create($utente);
		$this->assertNotNull($utente_salvato);
		$this->assertTrue($this->utenti_uguali($utente_salvato, $utente));
		self::$saves[] = $utente_salvato;
	}

	/** @dataProvider create_and_retrieve_users_provider */
	public function testExistsAfterCreation($nome, $cognome, $email, $password, $isGestore) {
		$this->realExistsTest($nome, $cognome, $email, sha1($password), $isGestore);
	}

	/** @dataProvider create_and_retrieve_users_provider */
	public function testGetFromID($nome, $cognome, $email, $password, $isGestore) {
		$app = new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore);
		$utente = null;
		foreach (self::$saves as $save)
			if ($this->utenti_uguali($app, $save))
				$utente = $save;
		assert(!is_null($utente));
		$utente_salvato = self::$account_dao->get_from_id($utente->getID());
		$this->assertNotNull($utente_salvato);
		$this->assertTrue($this->utenti_uguali($utente_salvato, $utente));
	}

	public function update_users_provider() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "provaprova", false, "ciaociao"],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "molise", true, "molisana"],
		];
	}

	/** @dataProvider update_users_provider */
	public function testUpdateUser($nome, $cognome, $email, $password, $isGestore, $nuova_password) {
		$app = new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore);
		$utente = null;
		foreach (self::$saves as $save)
			if ($this->utenti_uguali($app, $save))
				$utente = $save;
		assert(!is_null($utente));
		$utente->setPassword(sha1($nuova_password));
		$utente_salvato = self::$account_dao->update($utente);
		$this->assertTrue($this->utenti_uguali($utente, $utente_salvato));
	}

	public function authenticate_users_provider() {
		return [
			'mario rossi' => ["mario@rossi.lol", "ciaociao"],
			'michelantonio' => ["mama@non.mama", "molisana"],
		];
	}

	/** @dataProvider authenticate_users_provider */
	public function testAuthenticateUser($email, $password) {
		$oracle = null;
		foreach (self::$saves as $save)
			if ($save->getEmail() == $email and $save->getPassword() == sha1($password))
				$oracle = $save;
		assert(!is_null($oracle));
		$utente_loggato = self::$account_dao->authenticate($email, sha1($password));
		$this->assertNotNull($utente_loggato);
		$this->assertTrue($this->utenti_uguali($utente_loggato, $oracle));
	}

	public function delete_users_provider() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "ciaociao", false],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "molisana", true],
		];
	}

	/** @dataProvider delete_users_provider */
	public function testDeleteUser($nome, $cognome, $email, $password, $isGestore) {
		$app = new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore);
		$save_key = -1;
		foreach (self::$saves as $key => $save)
			if ($this->utenti_uguali($app, $save))
				$save_key = $key;
		$utente = self::$saves[$save_key];
		assert(!is_null($utente));
		unset(self::$saves[$save_key]);
		$res = self::$account_dao->delete($utente->getID());
		$this->assertTrue($res);
	}

}