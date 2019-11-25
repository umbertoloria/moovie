<?php

$path = substr(strtok($_SERVER["REQUEST_URI"], '?'), 1);

$append = str_repeat("../", count(explode("/", $path)) - 1);

include $append . "php/database.php";

include $append . "models/Utente.php";
include $append . "models/Artista.php";

include $append . "managers/ArtistaManager.php";
