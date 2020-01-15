<?php

$_SERVER["DOCUMENT_ROOT"] = substr(getcwd(), 0, strpos(getcwd(), "moovie") + 7);

include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Film.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Recitazione.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Genere.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Giudizio.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Promemoria.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/models/Amicizia.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IAccountDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IAmiciziaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IArtistaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IFilmDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IGenereDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IGiudizioDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IPromemoriaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IRecitazioneDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IRegiaDAO.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBAccountDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBAmiciziaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBArtistaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBFilmDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBGenereDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBGiudizioDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBPromemoriaDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBRecitazioneDAO.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBRegiaDAO.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/AccountDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/AmiciziaDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/ArtistaDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/FilmDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/GenereDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/GiudizioDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/PromemoriaDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/RecitazioneDAOFactory.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/RegiaDAOFactory.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/validator.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/formats.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/Auth.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/safety.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/Testing.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/parts/FormFeedbacker.php";