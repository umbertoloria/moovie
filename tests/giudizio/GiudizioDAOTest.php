<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubGiudizioDAO.php";

class GiudizioDAOTest extends GenericTest {

	private static $giudizio_dao;

	public static function setUpBeforeClass(): void {
//		GiudizioDAOFactory::useStub(); // per testare il DB bisogna avere gli id 1, 2, 3 liberi ed auto_increment = 1
		self::$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
	}

	public function existPre() {
		return [
			"giudizio utente A film A" => [1, 20, false],
			"giudizio utente B film B" => [2, 25, false],
			"giudizio utente A film C" => [1, 30, false]
		];
	}

	/** @dataProvider existPre */
	public function testPreExists($utente_id, $film_id, $oracle) {
		$this->assertEquals(
			self::$giudizio_dao->exists($utente_id, $film_id),
			$oracle
		);
	}

	public function create() {
		return [
			"giudizio utente A film A" => [1, 20, 7, true],
			"giudizio utente B film B" => [2, 25, 8, true],
			"giudizio utente A film C" => [1, 30, 10, true],
			"giudizio utente A film C (già esiste)" => [1, 30, 8, false]
		];
	}

	/** @dataProvider create */
	public function testCreate(int $utente_id, int $film_id, float $voto, bool $oracle) {
		$this->assertEquals(
			self::$giudizio_dao->create(
				new Giudizio($utente_id, $film_id, $voto, "")
			),
			$oracle
		);
	}

	public function existPost() {
		return [
			"giudizio utente A film A" => [1, 20, true],
			"giudizio utente B film B" => [2, 25, true],
			"giudizio utente A film C" => [1, 30, true]
		];
	}

	/** @dataProvider existPost */
	public function testPostExists(int $utente_id, int $film_id, bool $oracle) {
		$this->assertEquals(
			self::$giudizio_dao->exists($utente_id, $film_id),
			$oracle
		);
	}

	public function getAll() {
		return [
			"giudizi utente A" => [[1], [
				[1, 20, 7],
				[1, 30, 10]
			]],
			"giudizi utente B" => [[2], [
				[2, 25, 8]
			]],
			"giudizi utente A e B" => [[1, 2], [
				[1, 20, 7],
				[1, 30, 10],
				[2, 25, 8]
			]]
		];
	}

	/** @dataProvider getAll */
	public function testGetAll(array $utenti_ids, array $oracle) {
		$giudizi = self::$giudizio_dao->findByUtenti($utenti_ids);
		$this->assertEquals(count($giudizi), count($oracle));
		// ogni giudizio restituito deve combaciare con quelli presenti nell'oracolo
		foreach ($giudizi as $giudizio) {
			// per ogni giudizio prelevato dal dao, cerco il corrispondente nell'oracolo
			$trovato = false;
			$key = -1;
			foreach ($oracle as $key => $oracolini) {
				if ($giudizio->getUtente() == $oracolini[0] and $giudizio->getFilm() == $oracolini[1]
					and $giudizio->getVoto() == $oracolini[2]) {
					$trovato = true;
					break;
				}
			}
			$this->assertTrue($trovato);
			unset($oracle[$key]);
			// se tutto va bene (giudizio è presente nell'oracolo) allora rimuovo la parte dell'oracolo
			// corrispondente al giudizio su cui sto iterando
		}
		// se i dati combaciano, l'oracolo dovrebbe essersi svuotato
		$this->assertTrue(count($oracle) == 0);
	}

	public function retrieve() {
		return [
			"giudizi utente A film A" => [1, 20, [1, 20, 7]],
			"giudizi utente B film B" => [2, 25, [2, 25, 8]],
			"giudizi utente B film A" => [2, 20, []]
		];
	}

	/** @dataProvider retrieve */
	public function testRetrive(int $utente_id, int $film_id, array $oracle) {
		$giudizio = self::$giudizio_dao->findByUtenteAndFilm($utente_id, $film_id);
		if (empty($oracle)) {
			$this->assertNull($giudizio);
		} else {
			$this->assertNotNull($giudizio);
			$this->assertEquals($giudizio->getUtente(), $oracle[0]);
			$this->assertEquals($giudizio->getFilm(), $oracle[1]);
			$this->assertEquals($giudizio->getVoto(), $oracle[2]);
		}
	}

	public function update() {
		return [
			"giudizi utente A film A 7=>8" => [1, 20, 8, [true, 1, 20, 8]],
			"giudizi utente B film B 8=>8" => [2, 25, 8, [false, 2, 25, 8]],
			"giudizi utente B film A null" => [2, 20, 10, [false]]
		];
	}

	/** @dataProvider update */
	public function testUpdate(int $utente_id, int $film_id, float $voto, array $oracle) {
		// provo ad aggiornare un giudizio
		$result = self::$giudizio_dao->update(
			new Giudizio($utente_id, $film_id, $voto, "")
		);
		$this->assertEquals($result, $oracle[0]);
		// se ha potuto aggiornarlo, dovrei prelevare il giudizio con il nuovo voto
		// se non ha potuto, ci sono tre casi da contemplare:
		// - il giudizio è presente, e il voto era lo stesso: ok
		// - il giudizio non è presente: ok
		// - il giudizio è presente, ma non ha potuto aggiornarlo: failure
		$giudizio = self::$giudizio_dao->findByUtenteAndFilm($utente_id, $film_id);
		if ($oracle[0]) {
			$this->assertNotNull($giudizio);
			$this->assertEquals($giudizio->getUtente(), $oracle[1]);
			$this->assertEquals($giudizio->getFilm(), $oracle[2]);
			$this->assertEquals($giudizio->getVoto(), $oracle[3]);
		} else {
			if (count($oracle) == 1) {
				$this->assertNull($giudizio);
			} else {
				$this->assertNotNull($giudizio);
				$this->assertEquals($giudizio->getUtente(), $oracle[1]);
				$this->assertEquals($giudizio->getFilm(), $oracle[2]);
				$this->assertEquals($giudizio->getVoto(), $oracle[3]);
			}
		}
	}

	public function delete() {
		return [
			"giudizi utente A film A" => [1, 20, true],
			"giudizi utente B film B" => [2, 25, true],
			"giudizi utente B film A null" => [2, 20, false],
			"giudizi utente A film C" => [1, 30, true],
			"giudizi utente A film C (già cancellato)" => [1, 30, false]
		];
	}

	/** @dataProvider delete */
	public function testDelete(int $utente_id, int $film_id, bool $oracle) {
		// provo a calcellare un giudizio
		$result = self::$giudizio_dao->delete(
			new Giudizio($utente_id, $film_id, 1, "")
		);
		$this->assertEquals($result, $oracle);
		// sia se ha potuto cancellarlo, sia se non ha potuto (magari non esisteva), adesso non dovrebbe esistere
		$this->assertNull(
			self::$giudizio_dao->findByUtenteAndFilm($utente_id, $film_id)
		);
	}

}