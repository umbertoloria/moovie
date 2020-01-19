<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class AggiungereGenereTest extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;
	private static $genere_dao;
	private static $drammatico;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$userid_normale = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
		)->getID();
		self::$userid_gestore = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Antoniani", "g.antoniani@gmail.com", sha1("140898"), true)
		)->getID();
//		GenereDAOFactory::useStub();
		self::$genere_dao = GenereDAOFactory::getGenereDAO();
		self::$drammatico = self::$genere_dao->create(new Genere(0, "Drammatico"));
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$userid_normale);
		self::$account_dao->delete(self::$userid_gestore);
		if (self::$drammatico)
			self::$genere_dao->delete(self::$drammatico->getID());
	}

	private function callController($userid, $nome) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_POST["nome"] = $nome;
		ob_start();
		include "../../controllers/gestione/Aggiungi genere.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_5_3_1() {
		$response = $this->callController(null, "Inesistente");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_3_2() {
		$response = $this->callController(self::$userid_normale, "Inesistente");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_3_3() {
		$response = $this->callController(self::$userid_gestore, "");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_3_4() {
		$response = $this->callController(self::$userid_gestore, "Drammatico");
		$this->assertTrue(
			Testing::assert_message($response, "Questo nome è associato ad un genere esistente")
		);
	}

	public function test_TC_5_3_5() {
		$response = $this->callController(self::$userid_gestore, "Inesistente");
		$this->assertTrue(
			Testing::assert_redirect_starts($response, "/genere.php?id=")
		);
		$id_genere = Testing::getFeedback();
		$genere = self::$genere_dao->findByID($id_genere);
		$this->assertEquals($genere->getNome(), "Inesistente");
		$this->assertTrue(self::$genere_dao->delete($id_genere));
	}

}