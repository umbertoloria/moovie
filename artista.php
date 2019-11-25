<?php

include "php/core.php";
include "parts/head.php";

$_REQUEST["artista"] = ArtistaManager::doRetrieveByID($_GET["id"]);
include "views/PaginaArtista.php";
