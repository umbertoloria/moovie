<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubGenereDAO.php";

class GenereDAOTest extends GenericTest {

	/** @var IGenereDAO */
	private static $genere_dao;

	public static function setUpBeforeClass(): void {
//		GenereDAOFactory::useStub(); // per testare il DB bisogna avere gli id 1, 2, 3 liberi ed auto_increment = 1
		self::$genere_dao = GenereDAOFactory::getGenereDAO();
	}

	public function existsPre() {
		return [
			'genere 1' => ["Fantascienzoso", false],
			'genere 2' => ["Fantascienzoso", false],
		];
	}

	/** @dataProvider existsPre */
	public function testExistsBeforeCreation($nome, $oracle) {
		$this->assertEquals(
			self::$genere_dao->exists($nome),
			$oracle
		);
	}

	public function create() {
		return [
			'genere 1' => ["Fantascienzoso", ["Fantascienzoso"]],
			'genere 2' => ["Amazzonico", ["Amazzonico"]],
			'genere 3' => ["Incredibile", ["Incredibile"]],
		];
	}

	/** @dataProvider create */
	public function testCreate($nome, $oracle) {
		$result = self::$genere_dao->create(new Genere(0, $nome));
		if (empty($oracle))
			$this->assertNull($result);
		else {
			$this->assertNotNull($result);
			$this->assertEquals($result->getNome(), $oracle[0]);
		}
	}

	public function existsPost() {
		return [
			'genere 1' => ["Fantascienzoso", true],
			'genere 2' => ["Amazzonico", true,],
			'genere 3' => ["Incredibile", true],
			'non esiste' => ["Inesistente", false],
		];
	}

	/** @dataProvider existsPost */
	public function testExistsAfterCreation($nome, $oracle) {
		$this->assertEquals(
			self::$genere_dao->exists($nome),
			$oracle
		);
	}

	public function get_from_id() {
		return [
			'genere 1' => [1, ["Fantascienzoso"]],
			'genere 2' => [2, ["Amazzonico"]],
			'genere 3' => [3, ["Incredibile"]],
			'non esiste' => [4, []],
		];
	}

	/** @dataProvider get_from_id */
	public function testGetFromID($id, $oracle) {
		$result = self::$genere_dao->findByID($id);
		if (empty($oracle)) {
			$this->assertNull($result);
		} else {
			$this->assertNotNull($result);
			$this->assertEquals($result->getNome(), $oracle[0]);
		}
	}

	public function update() {
		return [
			'genere 1' => [1, "Fantascienzosismo", ["Fantascienzosismo"]],
			'genere 2' => [2, "Amazzonicismo", ["Amazzonicismo"]],
			'genere 3' => [3, "Incredibilismo", ["Incredibilismo"]],
			'non esiste' => [4, "Non lo so", []],
		];
	}

	/** @dataProvider update */
	public function testUpdate($id, $nuovo_nome, $oracle) {
		$result = self::$genere_dao->update(new Genere($id, $nuovo_nome));
		if (empty($oracle)) {
			$this->assertNull($result);
		} else {
			$this->assertNotNull($result);
			$this->assertEquals($result->getNome(), $oracle[0]);
		}
	}

	public function set_only() {
		return [
			'film 1 generi 1, 2' => [1, [1, 2], true],
			'film 2 generi 2, 3' => [2, [2, 3], true],
			'film 3 generi 1, 3' => [3, [1, 3], true],
		];
	}

	/** @dataProvider set_only */
	public function testSetOnly($film_id, $assign_genere_ids, $oracle) {
		$result = self::$genere_dao->setOnly($film_id, $assign_genere_ids);
		$this->assertEquals($result, $oracle);
	}

	public function get_generi_from_film() {
		return [
			'film 1 generi 1, 2' => [1, [2, 1]],
			'film 2 generi 2, 3' => [2, [2, 3]],
			'film 3 generi 1, 3' => [3, [3, 1]],
			'film 4 nessun generi' => [4, []],
		];
	}

	/** @dataProvider get_generi_from_film */
	public function testGetGeneriFromFilm($film_id, $oracle) {
		$result = self::$genere_dao->findGeneriByFilm($film_id);
		if (empty($oracle)) {
			$this->assertTrue(empty($result));
		} else {
			$this->assertEquals(count($result), count($oracle));
			foreach ($oracle as $oracolino)
				$this->assertTrue(in_array($oracolino, $result));
		}
	}

	public function get_films_from_genere() {
		return [
			'genere 1 film 1, 3' => [1, [1, 3]],
			'genere 2 film 1, 2' => [2, [2, 1]],
			'genere 3 film 2, 3' => [3, [3, 2]],
			'genere 4 non esiste' => [4, []],
		];
	}

	/** @dataProvider get_films_from_genere */
	public function testGetFilmsFromGenere($film_id, $oracle) {
		$result = self::$genere_dao->findFilmsByGenere($film_id);
		if (empty($oracle)) {
			$this->assertTrue(empty($result));
		} else {
			$this->assertEquals(count($result), count($oracle));
			foreach ($oracle as $oracolino)
				$this->assertTrue(in_array($oracolino, $result));
		}
	}

	public function testGetAll() {
		$generi = self::$genere_dao->getAll();
		$this->assertEquals(count($generi), 3);
		foreach ($generi as $genere) {
			if ($genere->getID() == 1)
				$this->assertEquals($genere->getNome(), "Fantascienzosismo");
			elseif ($genere->getID() == 2)
				$this->assertEquals($genere->getNome(), "Amazzonicismo");
			elseif ($genere->getID() == 3)
				$this->assertEquals($genere->getNome(), "Incredibilismo");
			else
				$this->assertTrue(false);
		}
	}

	public function delete() {
		return [
			'genere 1' => [1, true],
			'genere 2' => [2, true],
			'genere 3' => [3, true],
			'non esiste' => [4, false],
		];
	}

	/** @dataProvider delete */
	public function testDelete($id, $oracle) {
		$result = self::$genere_dao->delete($id);
		$this->assertEquals($result, $oracle);
		$this->assertNull(self::$genere_dao->findByID($id));
	}

}