<?php

class FilmDAOFactory {

	private static $stub = null;

	public static function useStub() {
		self::$stub = new StubFilmDAO();
	}

	public static function getFilmDAO(): IFilmDAO {
		if (self::$stub)
			return self::$stub;
		else
			return new DBFilmDAO();
	}

}