<?php

class RecitazioneDAOFactory {

	public static function getRecitazioneDAO(): IRecitazioneDAO {
		return new DBRecitazioneDAO();
	}

}