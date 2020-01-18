<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class RimuovereGenereTest extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;
	private static $genere_dao;
	private static $inesistente;

	public static function setUpBeforeClass(): void {
		Testing::init();
		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$userid_normale = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
		)->getID();
		self::$userid_gestore = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Antoniani", "g.antoniani@gmail.com", sha1("140898"), true)
		)->getID();
		GenereDAOFactory::useStub();
		self::$genere_dao = GenereDAOFactory::getGenereDAO();
		self::$inesistente = self::$genere_dao->create(new Genere(0, "Inesistente"));
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$userid_normale);
		self::$account_dao->delete(self::$userid_gestore);
		if (self::$inesistente)
			self::$genere_dao->delete(self::$inesistente->getID());
	}

	private function callController($userid, $genere_id) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_GET["genere_id"] = (string)$genere_id;
		ob_start();
		include "../../controllers/gestione/Rimuovi genere.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_5_5_1() {
		$response = $this->callController(null, self::$inesistente->getID());
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_5_2() {
		$response = $this->callController(self::$userid_normale, self::$inesistente->getID());
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
		$this->assertNull(Testing::getFeedback());
	}

	public function test_TC_5_5_3() {
		$response = $this->callController(self::$userid_gestore, self::$inesistente->getID());
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
		$this->assertTrue(Testing::getFeedback() == "ok");
	}

}