<?php

//$path = substr(strtok($_SERVER["REQUEST_URI"], '?'), 1);
//$append = str_repeat("../", count(explode("/", $path)) - 1);

include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/formats.php";

include $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Film.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Recitazione.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Genere.php";

include $_SERVER["DOCUMENT_ROOT"] . "/managers/ArtistaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/AccountManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RecitazioneManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RegiaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GenereManager.php";
