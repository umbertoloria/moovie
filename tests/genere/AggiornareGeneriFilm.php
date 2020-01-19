<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubFilmDAO.php";
include_once "../stubs/StubGenereDAO.php";

class AggiornareGeneriFilm extends GenericTest {

	private static $account_dao;
	private static $userid_normale;
	private static $userid_gestore;
	private static $film_dao;
	private static $eternal_sunshine_of_a_spotless_mind;
	private static $genere_dao;
	private static $drammatico;

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
		FilmDAOFactory::useStub();
		self::$film_dao = FilmDAOFactory::getFilmDAO();
		self::$eternal_sunshine_of_a_spotless_mind = self::$film_dao->create(
			new Film(0, "Eternal Sunshine of the Spotless Mind", 108, 2004,
				"Splendore del cinema indipendente"), "");
		GenereDAOFactory::useStub();
		self::$genere_dao = GenereDAOFactory::getGenereDAO();
		self::$drammatico = self::$genere_dao->create(new Genere(0, "Drammatico "));
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$userid_normale);
		self::$account_dao->delete(self::$userid_gestore);
		self::$genere_dao->delete(self::$drammatico->getID());
		if (self::$eternal_sunshine_of_a_spotless_mind)
			self::$film_dao->delete(self::$eternal_sunshine_of_a_spotless_mind->getID());
	}

	private function callController($userid, $film_id, $assign_genere_ids) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_POST["film_id"] = (string)$film_id;
		foreach ($_POST as $key => $val)
			if (Formats\startswith("gen_", $key))
				unset($_POST[$key]);
		foreach ($assign_genere_ids as $assign_genere_id)
			$_POST["gen_$assign_genere_id"] = "on";
		ob_start();
		include "../../controllers/gestione/Aggiornamento generi di film.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_5_6_1() {
		$response = $this->callController(null, self::$eternal_sunshine_of_a_spotless_mind->getID(),
			[self::$drammatico->getID()]);
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
	}

	public function test_TC_5_6_2() {
		$response = $this->callController(self::$userid_normale, self::$eternal_sunshine_of_a_spotless_mind->getID(),
			[self::$drammatico->getID()]);
		$this->assertTrue(
			Testing::assert_redirect($response, "/")
		);
		$this->assertNull(Testing::getFeedback());
	}

	public function test_TC_5_6_3() {
		$response = $this->callController(self::$userid_gestore, self::$eternal_sunshine_of_a_spotless_mind->getID(),
			[self::$drammatico->getID()]);
		$this->assertTrue(
			Testing::assert_redirect($response, "/film.php?id=" . self::$eternal_sunshine_of_a_spotless_mind->getID())
		);
		$this->assertTrue(
			in_array(
				self::$drammatico->getID(),
				self::$genere_dao->findGeneriByFilm(self::$eternal_sunshine_of_a_spotless_mind->getID())
			)
		);
	}

}