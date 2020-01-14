<?php

class PromemoriaDAOFactory {

	public static function getPromemoriaDAO(): IPromemoriaDAO {
		return new DBPromemoriaDAO();
	}

}