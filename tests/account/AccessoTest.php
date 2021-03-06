<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";

class AccessoTest extends GenericTest {

	private static $account_dao;
	private static $todel = null;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$todel = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898")));
	}

	public static function tearDownAfterClass(): void {
		if (self::$todel !== null)
			self::$account_dao->delete(self::$todel->getID());
	}

	private function callController($email, $password) {
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		ob_start();
		include "../../controllers/account/Accesso.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_2_2_1() {
		$response = $this->callController("g.", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_2_2() {
		$response = $this->callController("g.verdigmail.com", "140898");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_2_3() {
		$response = $this->callController("gianluca.pirone9@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_message($response, "I dati non corrispondono")
		);
	}

	public function test_TC_2_2_4() {
		$response = $this->callController("g.verdi@gmail.com", "");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_2_5() {
		$response = $this->callController("g.verdi@gmail.com", "140899");
		$this->assertTrue(
			Testing::assert_message($response, "I dati non corrispondono")
		);
	}

	public function test_TC_2_2_6() {
		$response = $this->callController("g.verdi@gmail.com", "140898");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

}