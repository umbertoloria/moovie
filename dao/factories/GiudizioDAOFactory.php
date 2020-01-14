<?php

class GiudizioDAOFactory {

	public static function getGiudizioDAO(): IGiudizioDAO {
		return new DBGiudizioDAO();
	}

}