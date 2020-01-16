<?php

class GiudizioDAOFactory {

	private static $stub = null;

	public static function useStub() {
		self::$stub = new StubGiudizioDAO();
	}

	public static function getGiudizioDAO(): IGiudizioDAO {
		if (self::$stub)
			return self::$stub;
		else
			return new DBGiudizioDAO();
	}

}