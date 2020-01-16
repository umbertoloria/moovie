<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "stubs/StubAccountDAO.php";

class RegistrazioneTest extends GenericTest {

	private static $account_dao;
	private static $todel = null;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$todel = self::$account_dao->create(
			new Utente(0, "Gianluca", "Pirone", "gianluca.pirone9@gmail.com", "gianluca")
		);
	}

	public static function tearDownAfterClass(): void {
		if (self::$todel !== null)
			self::$account_dao->delete(self::$todel->getID());
	}

	private function callController($nome, $cognome, $email, $password) {
		$_POST["nome"] = $nome;
		$_POST["cognome"] = $cognome;
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		ob_start();
		include "../../controllers/account/Registrazione.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_2_1_1() {
		$response = $this->callController("", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_2() {
		$response = $this->callController("######", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_3() {
		$response = $this->callController("Giuseppe", "", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_4() {
		$response = $this->callController("Giuseppe", "######", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_5() {
		$response = $this->callController("Giuseppe", "Verdi", "", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_6() {
		$response = $this->callController("Giuseppe", "Verdi", "g.verdigmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_1_7() {
		$response = $this->callController("Giuseppe", "Verdi", "gianluca.pirone9@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_message($response, "Già esiste")
		);
	}

	public function test_TC_2_1_8() {
		$response = $this->callController("Giuseppe", "Verdi", "gianluca.pirone9@gmail.com", "");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	// test_TC_2_1_9 non praticabile (coinvolge 'copassword')

	public function test_TC_2_1_10() {
		$response = $this->callController("Giuseppe", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_redirect($response, "/conferma_registrazione.php")
		);
		$id_utente_creato = Testing::getFeedback();
		$this->assertTrue($id_utente_creato !== null);
		$this->assertTrue(
			self::$account_dao->delete($id_utente_creato)
		);
	}

}