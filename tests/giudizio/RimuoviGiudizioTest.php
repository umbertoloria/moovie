<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGiudizioDAO.php";

class RimuoviGiudizioTest extends GenericTest {

	private static $giudizio_dao;
	private static $account_dao;
	private static $userid;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$userid = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
		)->getID();
//		GiudizioDAOFactory::useStub();
		self::$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
		self::$giudizio_dao->create(
			new Giudizio(self::$userid, 14, 10, "")
		);
	}

	public static function tearDownAfterClass(): void {
		if (is_int(self::$userid))
			self::$account_dao->delete(self::$userid);
		self::$giudizio_dao->delete(
			new Giudizio(self::$userid, 14, 10, "")
		);
	}

	private function callController($userid, $film_id) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_GET["film_id"] = (string)$film_id;
		ob_start();
		include "../../controllers/film/Rimuovi giudizio.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_4_3_1() {
		$response = $this->callController(null, 14);
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	// test_TC_4_3_2 non praticabile (impossibile capire che il film 1000 non esiste)

	public function test_TC_4_3_3() {
		$response = $this->callController(self::$userid, 14);
		echo $response;
		$this->assertTrue(
			Testing::assert_redirect($response, "/giudizi.php")
		);
	}

	public function test_TC_4_3_4() {
		$response = $this->callController(self::$userid, 14);
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

}