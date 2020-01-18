<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubFilmDAO.php";

class FilmDAOTest extends GenericTest {

	private static $film_dao;

	public static function setUpBeforeClass(): void {
		FilmDAOFactory::useStub(); // per testare il DB bisogna avere gli id 1, 2 liberi ed auto_increment = 1
		self::$film_dao = FilmDAOFactory::getFilmDAO();
	}

	private function assertMatches(Film $result, $oracle) {
		$this->assertNotNull($result);
		$this->assertEquals($result->getTitolo(), $oracle[0]);
		$this->assertEquals($result->getDurata(), $oracle[1]);
		$this->assertEquals($result->getAnno(), $oracle[2]);
		$this->assertEquals($result->getDescrizione(), $oracle[3]);
	}

	public function create() {
		return [
			"forrest gump" => ["Forrest Gump", 142, 1994, "Capolavoro del cinema", "images/forrest-gump.jpg",
				["Forrest Gump", 142, 1994, "Capolavoro del cinema"]],
		];
	}

	/** @dataProvider create */
	public function testCreateUser($titolo, $durata, $anno, $descrizione, $copertina, $oracle) {
		$result = self::$film_dao->create(
			new Film(
				0, $titolo, $durata, $anno, $descrizione
			), file_get_contents($copertina)
		);
		$this->assertMatches($result, $oracle);
	}

	public function get_from() {
		return [
			"forrest gump" => [1, ["Forrest Gump", 142, 1994, "Capolavoro del cinema"]],
			"non esiste" => [2, []],
		];
	}

	/** @dataProvider get_from */
	public function testGetFromID($id, $oracle) {
		$result = self::$film_dao->get_from_id($id);
		if (empty($oracle))
			$this->assertNull($result);
		else
			$this->assertMatches($result, $oracle);
	}

	public function download_copertina_pre() {
		return [
			"forrest gump" => [1, "images/forrest-gump.jpg"],
			"non esiste" => [2, null],
		];
	}

	/** @dataProvider download_copertina_pre */
	public function testDownloadCopertinaPre($id, $oracle) {
		$result = self::$film_dao->downloadCopertina($id);
		if (is_null($oracle))
			$this->assertNull($result);
		else
			$this->assertTrue($result === file_get_contents($oracle));
	}

	public function update() {
		return [
			"forrest gump" => [1, "Forrest Gump", 142, 1994, "Capolavoro del cinema mondiale",
				["Forrest Gump", 142, 1994, "Capolavoro del cinema mondiale"]],
		];
	}

	/** @dataProvider update */
	public function testUpdateUser($id, $nuovo_nome, $nuova_durata, $nuovo_anno, $nuova_descrizione, $oracle) {
		$film = self::$film_dao->get_from_id($id);
		if (empty($oracle)) {
			$this->assertNull($film);
		} else {
			$this->assertNotNull($film);
			$film->setTitolo($nuovo_nome);
			$film->setDurata($nuova_durata);
			$film->setAnno($nuovo_anno);
			$film->setDescrizione($nuova_descrizione);
			$result = self::$film_dao->update($film);
			$this->assertMatches($result, $oracle);
		}
	}

	public function upload_copertina() {
		return [
			"forrest gump (uguale)" => [1, "images/forrest-gump.jpg", true],
			"forrest gump (diversa)" => [1, "images/forrest-gump-2.jpg", true],
			"non esiste" => [2, "images/forrest-gump-2.jpg", false],
		];
	}

	/** @dataProvider upload_copertina */
	public function testUploadCopertina($id, $nuova_copertina, $oracle) {
		$result = self::$film_dao->uploadCopertina($id, file_get_contents($nuova_copertina));
		$this->assertEquals($result, $oracle);
	}

	public function download_copertina_post() {
		return [
			"forrest gump" => [1, "images/forrest-gump-2.jpg"],
			"non esiste" => [2, null],
		];
	}

	/** @dataProvider download_copertina_post */
	public function testDownloadCopertinaPost($id, $oracle) {
		$result = self::$film_dao->downloadCopertina($id);
		if (is_null($oracle))
			$this->assertNull($result);
		else
			$this->assertTrue($result === file_get_contents($oracle));
	}

	public function delete() {
		return [
			"forrest gump" => [1, true],
			"non esiste" => [2, false],
		];
	}

	/** @dataProvider delete */
	public function testDeleteUser($id, $oracle) {
		$result = self::$film_dao->delete($id);
		$this->assertEquals($result, $oracle);
		$this->assertNull(
			self::$film_dao->get_from_id($id)
		);
	}

	public function testRicerca() {
		$art1 = self::$film_dao->create(
			new Film(0, "Eternal Sunshine of the Spotless Mind", 108, 2004,
				"Splendore del cinema indipendente"), "");
		$art2 = self::$film_dao->create(
			new Film(0, "Il caso Spotlight", 127, 2015,
				"Indagine sulla pedofilia nella chiesa"), "");
		$art3 = self::$film_dao->create(
			new Film(0, "C'era una volta in America", 229, 1984,
				"Capolavoro del cinema mondiale"), "");

		$res = self::$film_dao->search("Capolavoro");

		$this->assertTrue(count($res) == 1);
		$this->assertTrue($res[0]->getTitolo() == $art3->getTitolo());
		$this->assertTrue($res[0]->getDurata() == $art3->getDurata());
		$this->assertTrue($res[0]->getAnno() == $art3->getAnno());
		$this->assertTrue($res[0]->getDescrizione() == $art3->getDescrizione());

		$this->assertTrue(self::$film_dao->delete($art1->getID()));
		$this->assertTrue(self::$film_dao->delete($art2->getID()));
		$this->assertTrue(self::$film_dao->delete($art3->getID()));
	}

}