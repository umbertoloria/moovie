<?php

class AccountDAOFactory {

	private static $stub = null;

	public static function useStub() {
		self::$stub = new StubAccountDAO();
	}

	public static function getAccountDAO(): IAccountDAO {
		if (self::$stub)
			return self::$stub;
		else
			return new DBAccountDAO();
	}

}