<?php

class AmiciziaDAOFactory {

	public static function getAmiciziaDAO(): IAmiciziaDAO {
		return new DBAmiciziaDAO();
	}

}