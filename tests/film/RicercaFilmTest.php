<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubFilmDAO.php";

class RicercaFilmTest extends GenericTest {

	private static $film_dao;
	private static $film0;

	public static function setUpBeforeClass(): void {
		Testing::init();
		FilmDAOFactory::useStub();
		self::$film_dao = FilmDAOFactory::getFilmDAO();
		self::$film0 = self::$film_dao->create(
			new Film(0, "Eternal Sunshine of the Spotless Mind", 108, 2004,
				"Splendore del cinema indipendente"), "");
	}

	public static function tearDownAfterClass(): void {
		if (self::$film0 !== null)
			self::$film_dao->delete(self::$film0->getID());
	}

	private function callController($kind, $fulltext) {
		$_GET["kind"] = $kind;
		$_GET["fulltext"] = $fulltext;
		ob_start();
		include "../../controllers/ricerca/Ricerca.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_1_1_1() {
		$response = $this->callController("film", "");
		$this->assertTrue(
			Testing::assert_redirect($response, "/404.php")
		);
	}

	public function test_TC_1_1_2() {
		$response = $this->callController("film", "spotless mind");
		$this->assertTrue(strpos($response, "Eternal Sunshine of the Spotless Mind") !== false);
	}

}