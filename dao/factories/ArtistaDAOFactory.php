<?php

class ArtistaDAOFactory {

	private static $stub = null;

	public static function useStub() {
		self::$stub = new StubArtistaDAO();
	}

	public static function getArtistaDAO(): IArtistaDAO {
		if (self::$stub)
			return self::$stub;
		else
			return new DBArtistaDAO();
	}

}