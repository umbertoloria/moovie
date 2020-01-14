<?php

class FilmDAOFactory {

	public static function getFilmDAO(): IFilmDAO {
		return new DBFilmDAO();
	}

}