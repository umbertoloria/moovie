<?php

include_once "../../php/database.php";
include_once "../../models/Utente.php";
include_once "../../dao/factories/AccountDAOFactory.php";
include_once "../../dao/interfaces/IAccountDAO.php";
include_once "../../dao/implementation/DBAccountDAO.php";
include_once "stubs/StubAccountDAO.php";

class RegistrazioneTest extends PHPUnit\Framework\TestCase {

	/** @beforeClass */
	public static function init() {
		$test = true;
		if ($test) {
			AccountDAOFactory::initTest();
			$account_dao = AccountDAOFactory::getAccountDAO();
			$account_dao->create(
				new Utente(0, "Gianluca", "Pirone", "gianluca.pirone9@gmail.com", "password")
			);
		}
	}

	private function checkMSG($response, $msg) {
		$result = [1 => null];
		preg_match("/<div id='form_error'><p>(.*)<\/p>/", $response, $result);
		return $result[1] === $msg;
	}

	private function callController($nome, $cognome, $email, $password) {
		$_POST["nome"] = $nome;
		$_POST["cognome"] = $cognome;
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		ob_start();
		include "../../controllers/account/Registrazione.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC21_1() {
		$response = $this->callController("", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_2() {
		$response = $this->callController("######", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_3() {
		$response = $this->callController("Giuseppe", "", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_4() {
		$response = $this->callController("Giuseppe", "######", "g.verdi@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_5() {
		$response = $this->callController("Giuseppe", "Verdi", "", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_6() {
		$response = $this->callController("Giuseppe", "Verdi", "g.verdigmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC21_7() {
		$response = $this->callController("Giuseppe", "Verdi", "gianluca.pirone9@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Già esiste")
		);
	}

	public function test_TC21_8() {
		$response = $this->callController("Giuseppe", "Verdi", "gianluca.pirone9@gmail.com", "");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	// tc219

	/** @runInSeparateProcess */
	public function test_TC21_10() {
		$response = $this->callController("Giuseppe", "Verdi", "g.verdi@gmail.com", "140898");
		$this->assertTrue($response == "");
	}

}