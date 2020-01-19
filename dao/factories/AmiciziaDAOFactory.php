<?php

class AmiciziaDAOFactory {

	private static $stub = null;

	public static function useStub() {
		self::$stub = new StubAmiciziaDAO();
	}

	public static function getAmiciziaDAO(): IAmiciziaDAO {
		if (self::$stub)
			return self::$stub;
		else
			return new DBAmiciziaDAO();
	}

}