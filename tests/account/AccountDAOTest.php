<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";

class AccountDAOTest extends GenericTest {

	private static $account_dao;

	public static function setUpBeforeClass(): void {
		AccountDAOFactory::useStub(); // per testare il DB bisogna avere gli id 1, 2, 3 liberi ed auto_increment = 1
		self::$account_dao = AccountDAOFactory::getAccountDAO();
	}

	private function assertMatches(Utente $result, $oracle) {
		$this->assertNotNull($result);
		$this->assertEquals($result->getNome(), $oracle[0]);
		$this->assertEquals($result->getCognome(), $oracle[1]);
		$this->assertEquals($result->getEmail(), $oracle[2]);
		$this->assertEquals($result->getPassword(), sha1($oracle[3]));
		$this->assertEquals($result->isGestore(), $oracle[4]);
	}

	public function existsPre() {
		return [
			'mario rossi' => ["mario@rossi.lol", false],
			'michelantonio' => ["mama@non.mama", false],
		];
	}

	/** @dataProvider existsPre */
	public function testExistsBeforeCreation($email, $oracle) {
		$this->assertEquals(
			self::$account_dao->exists($email),
			$oracle
		);
	}

	public function create() {
		return [
			'mario rossi' => ["Mario", "Rossi", "mario@rossi.lol", "provaprova", true,
				["Mario", "Rossi", "mario@rossi.lol", "provaprova", true]],
			'michelantonio' => ["Michelantonio", "Panichella", "mama@non.mama", "molise", false,
				["Michelantonio", "Panichella", "mama@non.mama", "molise", false]],
			'michelantonio (già esiste)' => ["Michelantonio", "Panichella", "mama@non.mama", "molise", true, []],
		];
	}

	/** @dataProvider create */
	public function testCreateUser($nome, $cognome, $email, $password, $isGestore, $oracle) {
		$result = self::$account_dao->create(
			new Utente(0, $nome, $cognome, $email, sha1($password), $isGestore)
		);
		if (empty($oracle))
			$this->assertNull($result);
		else
			$this->assertMatches($result, $oracle);
	}

	public function existsPost() {
		return [
			'mario rossi' => ["mario@rossi.lol", true],
			'michelantonio' => ["mama@non.mama", true],
		];
	}

	/** @dataProvider existsPost */
	public function testExistsAfterCreation($email, $oracle) {
		$this->assertEquals(
			self::$account_dao->exists($email),
			$oracle
		);
	}

	public function get_from() {
		return [
			'mario rossi' => [1, ["Mario", "Rossi", "mario@rossi.lol", "provaprova", true]],
			'michelantonio' => [2, ["Michelantonio", "Panichella", "mama@non.mama", "molise", false]],
			'michelantonio (già esiste)' => [3, []],
		];
	}

	/** @dataProvider get_from */
	public function testGetFromID($id, $oracle) {
		$result = self::$account_dao->get_from_id($id);
		if (empty($oracle))
			$this->assertNull($result);
		else
			$this->assertMatches($result, $oracle);
	}

	public function update() {
		return [
			'mario rossi' => [1, "ciaociao", ["Mario", "Rossi", "mario@rossi.lol", "ciaociao", true]],
			'michelantonio' => [2, "molisana", ["Michelantonio", "Panichella", "mama@non.mama", "molisana", false]],
			'non esiste' => [3, "molisana", []],
		];
	}

	/** @dataProvider update */
	public function testUpdateUser($id, $nuova_password, $oracle) {
		$utente = self::$account_dao->get_from_id($id);
		if (empty($oracle)) {
			$this->assertNull($utente);
		} else {
			$this->assertNotNull($utente);
			$utente->setPassword(sha1($nuova_password));
			$result = self::$account_dao->update($utente);
			$this->assertMatches($result, $oracle);
		}
	}

	public function authenticate() {
		return [
			'mario rossi' => ["mario@rossi.lol", "ciaociao", ["Mario", "Rossi", "mario@rossi.lol", "ciaociao", true]],
			'michelantonio' => ["mama@non.mama", "molisana", ["Michelantonio", "Panichella", "mama@non.mama", "molisana", false]],
			'michelantonio (vecchia password)' => ["mama@non.mama", "molise", []],
		];
	}

	/** @dataProvider authenticate */
	public function testAuthenticateUser($email, $password, $oracle) {
		$result = self::$account_dao->authenticate($email, sha1($password));
		if (empty($oracle))
			$this->assertNull($result);
		else
			$this->assertMatches($result, $oracle);
	}

	public function delete() {
		return [
			'mario rossi' => [1, true],
			'michelantonio' => [2, true],
			'non esiste' => [3, false],
		];
	}

	/** @dataProvider delete */
	public function testDeleteUser($id, $oracle) {
		$result = self::$account_dao->delete($id);
		$this->assertEquals($result, $oracle);
		$this->assertNull(
			self::$account_dao->get_from_id($id)
		);
	}

	public function testRicerca() {
		$acc1 = self::$account_dao->create(
			new Utente(0, "Umberto", "Loria", "a1", sha1("asdfas")));
		$acc2 = self::$account_dao->create(
			new Utente(0, "Teresa", "Del Vecchio", "a3", sha1("asdfas")));
		$acc3 = self::$account_dao->create(
			new Utente(0, "Manuela", "Pace", "a4", sha1("asdfas")));
		$acc4 = self::$account_dao->create(
			new Utente(0, "Angelo", "Del Giudice", "a5", sha1("asdfas")));

		$res = self::$account_dao->search("Del Teresa");
		$this->assertTrue(count($res) == 2);
		$this->assertTrue($res[0]->getNome() == $acc2->getNome());
		$this->assertTrue($res[0]->getCognome() == $acc2->getCognome());
		$this->assertTrue($res[1]->getNome() == $acc4->getNome());
		$this->assertTrue($res[1]->getCognome() == $acc4->getCognome());

		$this->assertTrue(self::$account_dao->delete($acc1->getID()));
		$this->assertTrue(self::$account_dao->delete($acc2->getID()));
		$this->assertTrue(self::$account_dao->delete($acc3->getID()));
		$this->assertTrue(self::$account_dao->delete($acc4->getID()));
	}

}