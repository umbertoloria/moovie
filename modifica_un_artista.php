<?php
include "parts/initial_page.php";
allowOnlyGestore();
$artista = ArtistaManager::get_from_id(@$_GET["id"]);
$_REQUEST["artista"] = $artista;
include "views/gestione/Form di modifica artista.php";