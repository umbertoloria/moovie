<?php

include $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Film.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Recitazione.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Genere.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Giudizio.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Promemoria.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Amicizia.php";

include $_SERVER["DOCUMENT_ROOT"] . "/managers/ArtistaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/AccountManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RecitazioneManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RegiaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GenereManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GiudizioManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/PromemoriaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/AmiciziaManager.php";

include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/formats.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/Auth.php";