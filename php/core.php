<?php

//$path = substr(strtok($_SERVER["REQUEST_URI"], '?'), 1);
//$append = str_repeat("../", count(explode("/", $path)) - 1);

include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";

include $_SERVER["DOCUMENT_ROOT"] . "/models/Utente.php";
include $_SERVER["DOCUMENT_ROOT"] . "/models/Artista.php";

include $_SERVER["DOCUMENT_ROOT"] . "/managers/ArtistaManager.php";
include $_SERVER["DOCUMENT_ROOT"] . "/managers/AccountManager.php";
