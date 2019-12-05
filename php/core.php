<?php

include $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Film.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Recitazione.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Genere.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/FilmGuardato.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/FilmDaGuardare.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Lista.php";

include $_SERVER["DOCUMENT_ROOT"] . "/managers/ArtistaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/AccountManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RecitazioneManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/RegiaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/GenereManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmGuardatiManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/FilmDaGuardareManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/ListaManager.php";

include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/formats.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/Auth.php";