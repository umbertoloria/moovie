<?php

include $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Film.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Recitazione.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Genere.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Giudizio.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Promemoria.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Amicizia.php";

include $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IAccountDAO.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IAmiciziaDAO.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/interfaces/IArtistaDAO.php";

include $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBAccountDAO.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBAmiciziaDAO.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/implementation/DBArtistaDAO.php";

include $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/AccountDAOFactory.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/AmiciziaDAOFactory.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dao/factories/ArtistaDAOFactory.php";

include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RecitazioneManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RegiaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GenereManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GiudizioManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/PromemoriaManager.php";

include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/formats.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/Auth.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/safety.php";

include $_SERVER["DOCUMENT_ROOT"] . "/parts/FormFeedbacker.php";