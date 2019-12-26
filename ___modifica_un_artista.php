<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
$artista = ArtistaManager::get_from_id(@$_GET["id"]);
$_REQUEST["artista"] = $artista;
include "views/gestione/___form_di_modifica_artista.php";