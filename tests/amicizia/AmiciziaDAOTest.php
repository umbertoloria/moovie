<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAmiciziaDAO.php";

class AmiciziaDAOTest extends GenericTest {

	private static $amicizia_dao;

	public static function setUpBeforeClass(): void {
//		AmiciziaDAOFactory::useStub();
		self::$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();
	}

	public function exists_something_between_before() {
		return [
			'amicizia 1-2 false' => [1, 2, false],
			'amicizia 3-4 false' => [3, 4, false],
		];
	}

	/** @dataProvider exists_something_between_before */
	public function testExistsSomethingBetweenBeforeRequest($user1, $user2, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->existsSomethingBetween($user1, $user2),
			$oracle
		);
	}

	public function request_friendship() {
		return [
			'amicizia 1-2' => [1, 2, true],
			'amicizia 3-4' => [3, 4, true],
			'amicizia 3-4 (già esiste)' => [3, 4, false],
			'amicizia 4-3 (già esiste)' => [4, 3, false],
		];
	}

	/** @dataProvider request_friendship */
	public function testRequestFriendshipFromTo($user_from, $user_to, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->requestFriendshipFromTo($user_from, $user_to),
			$oracle
		);
	}

	public function exists_something_between_after() {
		return [
			'amicizia 1-2' => [1, 2, true],
			'amicizia 2-1' => [2, 1, true],
			'amicizia 3-4' => [3, 4, true],
			'amicizia 4-3' => [4, 3, true],
		];
	}

	/** @dataProvider exists_something_between_after */
	public function testExistsSomethingBetweenAfterRequest($user1, $user2, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->existsSomethingBetween($user1, $user2),
			$oracle
		);
	}

	public function accept_friendship() {
		return [
			'amicizia 2-1 (invertita: no)' => [2, 1, false],
			'amicizia 1-2' => [1, 2, true],
			'amicizia 1-2 (di nuovo: no)' => [1, 2, false]
		];
	}

	/** @dataProvider accept_friendship */
	public function testAcceptFriendshipFromTo($user_from, $user_to, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->acceptFriendshipRequestFromTo($user_from, $user_to),
			$oracle
		);
	}

	public function exists_request_from_to() {
		return [
			'amicizia 1-2 no' => [1, 2, false],
			'amicizia 2-1 no' => [2, 1, false],
			'amicizia 3-4 si' => [3, 4, true],
			'amicizia 4-3 si' => [4, 3, false],
		];
	}

	/** @dataProvider exists_request_from_to */
	public function testExistsRequestFromTo($user1, $user2, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->existsRequestFromTo($user1, $user2),
			$oracle
		);
	}

	public function refuse_friendship() {
		return [
			'amicizia 3-4' => [3, 4, true],
			'amicizia 3-4 (di nuovo: no)' => [3, 4, false],
			'amicizia 4-3 (invertita: no)' => [4, 3, false],
		];
	}

	/** @dataProvider refuse_friendship */
	public function testRefuseFriendshipFromTo($user_from, $user_to, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->refuseFriendshipRequestFromTo($user_from, $user_to),
			$oracle
		);
	}

	public function remove_friendship() {
		return [
			'amicizia 1-2' => [1, 2, true],
			'amicizia 1-2 (di nuovo: no)' => [1, 2, false],
			'amicizia 2-1 (di nuovo e invertita: no)' => [2, 1, false],
			'amicizia 3-4 no' => [3, 4, false],
		];
	}

	/** @dataProvider remove_friendship */
	public function testRemoveFriendshipBetween($user1, $user2, $oracle) {
		$this->assertEquals(
			self::$amicizia_dao->removeFriendshipBetween($user1, $user2),
			$oracle
		);
	}

}

