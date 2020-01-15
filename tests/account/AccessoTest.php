<?php

include_once "../../php/database.php";
include_once "../../models/Utente.php";
include_once "../../dao/factories/AccountDAOFactory.php";
include_once "../../dao/interfaces/IAccountDAO.php";
include_once "../../dao/implementation/DBAccountDAO.php";
include_once "stubs/StubAccountDAO.php";

class AccessoTest extends PHPUnit\Framework\TestCase {

	/** @beforeClass */
	public static function init() {
		$test = true;
		if ($test) {
			AccountDAOFactory::initTest();
			$account_dao = AccountDAOFactory::getAccountDAO();
			$account_dao->create(
				new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
			);
		}
	}

	private function checkMSG($response, $msg) {
		$result = [1 => null];
		preg_match("/<div id='form_error'><p>(.*)<\/p>/", $response, $result);
		return $result[1] === $msg;
	}

	private function callController($email, $password) {
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		ob_start();
		include "../../controllers/account/Accesso.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC22_1() {
		$response = $this->callController("g.", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC22_2() {
		$response = $this->callController("g.verdigmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC22_3() {
		$response = $this->callController("gianluca.pirone9@gmail.com", "140898");
		$this->assertTrue(
			$this->checkMSG($response, "I dati non corrispondono")
		);
	}

	public function test_TC22_4() {
		$response = $this->callController("g.verdi@gmail.com", "");
		$this->assertTrue(
			$this->checkMSG($response, "Il client non ti ha bloccato?")
		);
	}

	public function test_TC22_5() {
		$response = $this->callController("g.verdi@gmail.com", "140899");
		$this->assertTrue(
			$this->checkMSG($response, "I dati non corrispondono")
		);
	}

	/** @runInSeparateProcess */
	public function test_TC22_6() {
		$response = $this->callController("g.verdi@gmail.com", "140898");
		$this->assertTrue($response == "");
	}

}