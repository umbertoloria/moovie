<?php

class ArtistaDAOFactory {

	public static function getArtistaDAO(): IArtistaDAO {
		return new DBArtistaDAO();
	}

}