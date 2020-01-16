<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";

class CambioPasswordTest extends GenericTest {

	// --do-not-cache-result

	private static $account_dao;
	private static $userid;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		$real_utente = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898")));
		self::$userid = $real_utente->getID();
	}

	public static function tearDownAfterClass(): void {
		if (self::$userid !== null)
			self::$account_dao->delete(self::$userid);
	}

	private function callController($userid, $cur_pwd, $new_pwd) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_POST["cur_pwd"] = $cur_pwd;
		$_POST["new_pwd"] = $new_pwd;
		ob_start();
		include "../../controllers/account/Cambio password.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_2_3_1() {
		$response = $this->callController(null, "", "");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_2_3_2() {
		$response = $this->callController(self::$userid, "", "Verdi09");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_3_3() {
		$response = $this->callController(self::$userid, "140899", "Verdi09");
		$this->assertTrue(
			Testing::assert_message($response, "La password attuale fornita non corrisponde")
		);
	}

	public function test_TC_2_3_4() {
		$response = $this->callController(self::$userid, "140898", "");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_2_3_5() {
		$response = $this->callController(self::$userid, "140898", "Verdi09");
		$this->assertTrue(
			Testing::assert_redirect($response, "/conferma_cambio_password.php")
		);
		$real_utente = self::$account_dao->get_from_id(self::$userid);
		$this->assertEquals($real_utente->getPassword(), sha1("Verdi09"));
	}

}