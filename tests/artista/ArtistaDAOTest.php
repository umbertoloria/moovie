<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubArtistaDAO.php";

class ArtistaDAOTest extends GenericTest {

	private static $artista_dao;

	public static function setUpBeforeClass(): void {
		ArtistaDAOFactory::useStub(); // per testare il DB bisogna avere gli id 1, 2 liberi ed auto_increment = 1
		self::$artista_dao = ArtistaDAOFactory::getArtistaDAO();
	}

	private function assertMatches(Artista $result, $oracle) {
		$this->assertNotNull($result);
		$this->assertEquals($result->getNome(), $oracle[0]);
		$this->assertEquals($result->getNascita(), $oracle[1]);
		$this->assertEquals($result->getDescrizione(), $oracle[2]);
	}

	public function create_artist_provider() {
		return [
			'johnny depp' => ["Johnny Depp", "1963-06-09", "E' un attore, produttore cinematografico e musicista statunitense", 'images/johnny-depp.jpg'],
		];
	}

	public function retrieve_artist_provider() {
		return [
			'johnny depp' => ["Johnny Depp", "1963-06-09", "E' un attore, produttore cinematografico e musicista statunitense"],
		];
	}

	public function delete_artist_provider() {
		return [
			'johnny depp' => ["Johnny Depp", "1963-06-09", "E' un attore, produttore cinematografico e musicista statunitense"],
		];
	}

	public function create() {
		return [
			'johnny depp' => ["Johnny Depp", "1963-06-09",
				"È un attore, produttore cinematografico e musicista statunitense", "images/johnny-depp.jpg",
				["Johnny Depp", "1963-06-09", "È un attore, produttore cinematografico e musicista statunitense"]],
		];
	}

	/** @dataProvider create */
	public function testCreateUser($nome, $nascita, $descrizione, $faccia, $oracle) {
		$result = self::$artista_dao->create(
			new Artista(0, $nome, $nascita, $descrizione), file_get_contents($faccia)
		);
		$this->assertMatches($result, $oracle);
	}

	public function get_from() {
		return [
			'johnny depp' => [1,
				["Johnny Depp", "1963-06-09", "È un attore, produttore cinematografico e musicista statunitense"]],
			'non esiste' => [2, []],
		];
	}

	/** @dataProvider get_from */
	public function testGetFromID($id, $oracle) {
		$result = self::$artista_dao->get_from_id($id);
		if (empty($oracle))
			$this->assertNull($result);
		else
			$this->assertMatches($result, $oracle);
	}

	public function download_faccia_pre() {
		return [
			'johnny depp' => [1, "images/johnny-depp.jpg"],
			'non esiste' => [2, null],
		];
	}

	/** @dataProvider download_faccia_pre */
	public function testDownloadFacciaPre($id, $oracle) {
		$result = self::$artista_dao->downloadFaccia($id);
		if (is_null($oracle))
			$this->assertNull($result);
		else
			$this->assertTrue($result === file_get_contents($oracle));
	}

	public function update() {
		return [
			'johnny depp' => [1, "John Christopher Depp II", "1963-06-09",
				"È un attore, produttore cinematografico e musicista statunitense",
				["John Christopher Depp II", "1963-06-09", "È un attore, produttore cinematografico e musicista statunitense"]],
		];
	}

	/** @dataProvider update */
	public function testUpdateUser($id, $nuovo_nome, $nuova_nascita, $nuova_descrizione, $oracle) {
		$artista = self::$artista_dao->get_from_id($id);
		if (empty($oracle)) {
			$this->assertNull($artista);
		} else {
			$this->assertNotNull($artista);
			$artista->setNome($nuovo_nome);
			$artista->setNascita($nuova_nascita);
			$artista->setDescrizione($nuova_descrizione);
			$result = self::$artista_dao->update($artista);
			$this->assertMatches($result, $oracle);
		}
	}

	public function upload_faccia() {
		return [
			'johnny depp (uguale)' => [1, "images/johnny-depp.jpg", true],
			'johnny depp (diversa)' => [1, "images/johnny-depp-2.jpg", true],
			'non esiste' => [2, "images/johnny-depp-2.jpg", false],
		];
	}

	/** @dataProvider upload_faccia */
	public function testUploadFaccia($id, $nuova_faccia, $oracle) {
		$result = self::$artista_dao->uploadFaccia($id, file_get_contents($nuova_faccia));
		$this->assertEquals($result, $oracle);
	}

	public function download_faccia_post() {
		return [
			'johnny depp' => [1, "images/johnny-depp-2.jpg"],
			'non esiste' => [2, null],
		];
	}

	/** @dataProvider download_faccia_post */
	public function testDownloadFacciaPost($id, $oracle) {
		$result = self::$artista_dao->downloadFaccia($id);
		if (is_null($oracle))
			$this->assertNull($result);
		else
			$this->assertTrue($result === file_get_contents($oracle));
	}

	public function testGetAll() {
		$artisti = self::$artista_dao->get_all();
		$this->assertTrue(count($artisti) == 1);
		$this->assertMatches(
			$artisti[0],
			["John Christopher Depp II", "1963-06-09",
				"È un attore, produttore cinematografico e musicista statunitense"]
		);
	}

	public function delete() {
		return [
			'johnny depp' => [1, true],
			'non esiste' => [2, false],
		];
	}

	/** @dataProvider delete */
	public function testDeleteUser($id, $oracle) {
		$result = self::$artista_dao->delete($id);
		$this->assertEquals($result, $oracle);
		$this->assertNull(
			self::$artista_dao->get_from_id($id)
		);
	}

	public function testRicerca() {
		$art1 = self::$artista_dao->create(
			new Artista(0, "Christopher Walken", "1943-03-31", "Attore americano"), "");
		$art2 = self::$artista_dao->create(
			new Artista(0, "Nicole Kidman", "1967-06-20", "Attrice australiana"), "");
		$art3 = self::$artista_dao->create(
			new Artista(0, "James Franco", "1978-04-19", "Attore americano"), "");

		$res = self::$artista_dao->search("Franco Attore");

		$this->assertTrue(count($res) == 2);
		foreach ($res as $art) {
			if ($art->getID() == $art1->getID()) {
				$this->assertTrue($art->getNome() == $art1->getNome());
				$this->assertTrue($art->getNascita() == $art1->getNascita());
				$this->assertTrue($art->getDescrizione() == $art1->getDescrizione());
			} elseif ($art->getID() == $art3->getID()) {
				$this->assertTrue($art->getNome() == $art3->getNome());
				$this->assertTrue($art->getNascita() == $art3->getNascita());
				$this->assertTrue($art->getDescrizione() == $art3->getDescrizione());
			} else {
				$this->assertTrue(false);
			}
		}

		$this->assertTrue(self::$artista_dao->delete($art1->getID()));
		$this->assertTrue(self::$artista_dao->delete($art2->getID()));
		$this->assertTrue(self::$artista_dao->delete($art3->getID()));
	}

}