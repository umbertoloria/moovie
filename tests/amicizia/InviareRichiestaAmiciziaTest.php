<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAmiciziaDAO.php";
include_once "../stubs/StubAccountDAO.php";

class InviareRichiestaAmiciziaTest extends GenericTest {

	private static $amicizia_dao;
	private static $account_dao;
	private static $user1_id;
	private static $user2_id;

	public static function setUpBeforeClass(): void {
		Testing::init();
		AmiciziaDAOFactory::useStub();
		AccountDAOFactory::useStub();
		self::$account_dao = AccountDAOFactory::getAccountDAO();
		self::$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();
		self::$user1_id = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898"))
		)->getID();
		self::$user2_id = self::$account_dao->create(
			new Utente(0, "Giuseppe", "Rossi", "g.rossi@gmail.com", sha1("140898"))
		)->getID();
	}

	public static function tearDownAfterClass(): void {
		self::$account_dao->delete(self::$user1_id);
		self::$account_dao->delete(self::$user2_id);
	}

	private function callController($userid, $to_user_id) {
		$_COOKIE["userid"] = $userid;
		Auth::init();
		$_GET["to_user_id"] = $to_user_id;
		ob_start();
		include "../../controllers/amicizia/Richiedi amicizia.php";
		$response = ob_get_contents();
		ob_end_clean();
		return $response;
	}

	public function test_TC_3_1_1() {
		$response = $this->callController(null, self::$user2_id);
		$this->assertEquals($response, "Il client non ti ha bloccato?");
	}

	public function test_TC_3_1_2() {
		$response = $this->callController(self::$user1_id, null);
		$this->assertEquals($response, "Il client non ti ha bloccato?");
	}

	public function test_TC_3_1_3() {
		$response = $this->callController(self::$user1_id, self::$user2_id);
		$this->assertEquals($response, "ok");
		$this->assertTrue(self::$amicizia_dao->existsRequestFromTo(self::$user1_id, self::$user2_id));
		$this->assertTrue(self::$amicizia_dao->refuseFriendshipRequestFromTo(self::$user1_id, self::$user2_id));
	}

}