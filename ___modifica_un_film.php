<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
$film = FilmManager::get_from_id(@$_GET["id"]);
$_REQUEST["film"] = $film;
include "views/gestione/___form_di_modifica_film.php";

$_REQUEST["artisti"] = ArtistaManager::get_all();
$_REQUEST["recitazioni"] = RecitazioneManager::get_from_film($film->getID());
$_REQUEST["registi"] = RegiaManager::get_artisti_from_film($film->getID());
include "views/gestione/___form_di_aggiornamento_artisti_in_film.php";

$_REQUEST["generi"] = GenereManager::get_all();
$_REQUEST["film_generi"] = GenereManager::get_generi_from_film($film->getID());
include "views/gestione/___form_di_aggiornamento_generi_in_film.php";