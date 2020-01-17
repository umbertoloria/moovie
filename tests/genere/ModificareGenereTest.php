<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class ModificareGenereTest extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;
	private static $genere_dao;
	private static $drammatico;
	private static $inesistente;

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
		self::$inesistente = self::$genere_dao->create(new Genere(0, "Inesistente"));
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$userid_normale);
		self::$account_dao->delete(self::$userid_gestore);
		if (self::$drammatico)
			self::$genere_dao->delete(self::$drammatico->getID());
		if (self::$inesistente)
			self::$genere_dao->delete(self::$inesistente->getID());
	}

	private function callController($user_id, $genere_id, $nome) {
		$_COOKIE["userid"] = $user_id;
		Auth::init();
		$_POST["genere_id"] = $genere_id;
		$_POST["nome"] = $nome;
		ob_start();
		include "../../controllers/gestione/Modifica genere.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_5_4_1() {
		$response = $this->callController(null, self::$inesistente->getID(), self::$inesistente->getNome());
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_4_2() {
		$response = $this->callController(self::$userid_normale, self::$inesistente->getID(), self::$inesistente->getNome());
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_4_3() {
		$response = $this->callController(self::$userid_gestore, self::$inesistente->getID(), "");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_4_4() {
		$response = $this->callController(self::$userid_gestore, self::$inesistente->getID(), "Drammatico");
		$this->assertTrue(
			Testing::assert_message($response, "Questo nome è associato ad un genere esistente")
		);
	}

	public function test_TC_5_4_5() {
		$response = $this->callController(self::$userid_gestore, self::$inesistente->getID(), "Impensabile");
		$this->assertTrue(
			Testing::assert_redirect($response, "/genere.php?id=" . self::$inesistente->getID())
		);
	}

}