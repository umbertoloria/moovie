<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";

class RicercaUtenteTest extends GenericTest {

	private static $account_dao;
	private static $acc0;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$acc0 = self::$account_dao->create(
			new Utente(0, "Teresa", "Del Vecchio", "tere_dv@gmail.com", sha1("dolci")));
	}

	public static function tearDownAfterClass(): void {
		if (self::$acc0 !== null)
			self::$account_dao->delete(self::$acc0->getID());
	}

	private function callController($uid, $kind, $fulltext) {
		$_COOKIE["userid"] = $uid;
		Auth::init();
		$_GET["kind"] = $kind;
		$_GET["fulltext"] = $fulltext;
		ob_start();
		include "../../controllers/ricerca/Ricerca.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_1_3_1() {
		$response = $this->callController(null, "utenti", "teresa");
		$this->assertTrue(
			Testing::assert_redirect($response, "/404.php")
		);
	}

	public function test_TC_1_3_2() {
		$response = $this->callController(self::$acc0->getID(), "utenti", "");
		$this->assertTrue(
			Testing::assert_redirect($response, "/404.php")
		);
	}

	public function test_TC_1_3_3() {
		$response = $this->callController(self::$acc0->getID(), "utenti", "teresa");
		$this->assertTrue(strpos($response, "Teresa Del Vecchio") !== false);
	}

}