<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubArtistaDAO.php";

class RicercaArtistaTest extends GenericTest {

	private static $artista_dao;
	private static $art0;

	public static function setUpBeforeClass(): void {
		Testing::init();
//		ArtistaDAOFactory::useStub();
		self::$artista_dao = ArtistaDAOFactory::getArtistaDAO();
		self::$art0 = self::$artista_dao->create(
			new Artista(0, "Johnny Depp", "1963-06-09", "Famoso attore di cinema"), "");
	}

	public static function tearDownAfterClass(): void {
		if (self::$art0 !== null)
			self::$artista_dao->delete(self::$art0->getID());
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

	public function test_TC_1_2_1() {
		$response = $this->callController("artisti", "");
		$this->assertTrue(
			Testing::assert_redirect($response, "/404.php")
		);
	}

	public function test_TC_1_2_2() {
		$response = $this->callController("artisti", "depp");
		$this->assertTrue(strpos($response, "Johnny Depp") !== false);
	}

}