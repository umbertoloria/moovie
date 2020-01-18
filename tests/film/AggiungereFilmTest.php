<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubFilmDAO.php";

class AggiungereFilmTest extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		FilmDAOFactory::useStub();
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

	private function callController($userid, $titolo, $durata, $anno, $descrizione, $copertina) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_POST["titolo"] = $titolo;
		$_POST["durata"] = $durata;
		$_POST["anno"] = $anno;
		$_POST["descrizione"] = $descrizione;
		$this->loadFile("copertina", $copertina);
		ob_start();
		include "../../controllers/gestione/Aggiungi film.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_5_1_1() {
		$response = $this->callController(null, "Eternal Sunshine of the Spotless Mind",
			108, 2004, "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_1_2() {
		$response = $this->callController(self::$userid_normale, "Eternal Sunshine of the Spotless Mind",
			"108", "2004", "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_1_3() {
		$response = $this->callController(self::$userid_gestore, "",
			"108", "2004", "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_1_4() {
		$response = $this->callController(self::$userid_gestore, "Eternal Sunshine of the Spotless Mind",
			"####", 2004, "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_1_5() {
		$response = $this->callController(self::$userid_gestore, "Eternal Sunshine of the Spotless Mind",
			"108", "204", "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_1_6() {
		$response = $this->callController(self::$userid_gestore, "Eternal Sunshine of the Spotless Mind",
			"108", "2004", "Spl", "images/eternal-sunshine-of-the-spotless-mind.jpg");
		$this->assertTrue(
			Testing::assert_block($response)
		);
	}

	public function test_TC_5_1_7() {
		$response = $this->callController(self::$userid_gestore, "Eternal Sunshine of the Spotless Mind",
			"108", "2004", "Splendore del cinema indipendente", "");
		$this->assertTrue(
			Testing::assert_message($response, "Nessun file è stato caricato")
		);
	}

	public function test_TC_5_1_8() {
		$response = $this->callController(self::$userid_gestore, "Eternal Sunshine of the Spotless Mind",
			"108", "2004", "Splendore del cinema indipendente",
			"images/eternal-sunshine-of-the-spotless-mind.jpg");
		$id_film_creato = Testing::getFeedback();
		$this->assertTrue($id_film_creato !== null);
		$this->assertTrue(
			Testing::assert_redirect($response, "/film.php?id=" . $id_film_creato)
		);
		$film_dao = FilmDAOFactory::getFilmDAO();
		$this->assertTrue(
			$film_dao->delete($id_film_creato)
		);
	}

}