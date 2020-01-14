<?php

class AccountDAOFactory {

	private static $test = false;

	public static function initTest() {
		self::$test = true;
	}

	public static function getAccountDAO(): IAccountDAO {
		if (self::$test)
			return new StubAccountDAO();
		else
			return new DBAccountDAO();
	}

}