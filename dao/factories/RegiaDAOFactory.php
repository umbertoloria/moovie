<?php

class RegiaDAOFactory {

	public static function getRegiaDAO(): IRegiaDAO {
		return new DBRegiaDAO();
	}

}