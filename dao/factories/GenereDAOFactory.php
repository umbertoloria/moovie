<?php

class GenereDAOFactory {

	public static function getGenereDAO(): IGenereDAO {
		return new DBGenereDAO();
	}

}