<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
$genere = GenereManager::get_from_id(@$_GET["id"]);
$_REQUEST["genere"] = $genere;
include "views/gestione/___form_di_modifica_genere.php";