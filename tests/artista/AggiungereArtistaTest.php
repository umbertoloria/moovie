<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubArtistaDAO.php";

class AggiungereArtistaTest extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		ArtistaDAOFactory::useStub();
//		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$userid_normale = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
		)->getID();
		self::$userid_gestore = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Antoniani", "g.antoniani@gmail.com", sha1("140898"), true)
		)->getID();
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$userid_normale);
		self::$account_dao->delete(self::$userid_gestore);
	}

	private function callController($userid, $nome, $nascita, $descrizione, $faccia) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_POST["nome"] = $nome;
		$_POST["nascita"] = $nascita;
		$_POST["descrizione"] = $descrizione;
		$this->loadFile("faccia", $faccia);
		ob_start();
		include "../../controllers/gestione/Aggiungi artista.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC52_1() {
		$response = $this->callController(null, "Johnny Depp", "1963-06-09",
			"Famoso attore di cinema", "images/johnny-depp.jpg");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC52_2() {
		$response = $this->callController(self::$userid_normale, "Johnny Depp", "1963-06-09",
			"Famoso attore di cinema", "images/johnny-depp.jpg");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC52_3() {
		$response = $this->callController(self::$userid_gestore, "", "1963-06-09",
			"Famoso attore di cinema", "images/johnny-depp.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC52_4() {
		$response = $this->callController(self::$userid_gestore, "Johnny Depp", "####",
			"Famoso attore di cinema", "images/johnny-depp.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC52_5() {
		$response = $this->callController(self::$userid_gestore, "Johnny Depp", "1963-06-09",
			"Fa", "images/johnny-depp.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC52_6() {
		$response = $this->callController(self::$userid_gestore, "Johnny Depp", "1963-06-09",
			"Famoso attore di cinema", "");
		$this->assertTrue(
			Testing::assert_message($response, "Nessun file è stato caricato")
		);
	}

	public function test_TC52_7() {
		$response = $this->callController(self::$userid_gestore, "Johnny Depp", "1963-06-09",
			"Famoso attore di cinema", "images/johnny-depp.jpg");
		$id_artista_creato = Testing::getFeedback();
		$this->assertTrue($id_artista_creato !== null);
		$this->assertTrue(
			Testing::assert_redirect($response, "/artista.php?id=" . $id_artista_creato)
		);
		$artista_dao = ArtistaDAOFactory::getArtistaDAO();
		$this->assertTrue(
			$artista_dao->delete($id_artista_creato)
		);
	}

}