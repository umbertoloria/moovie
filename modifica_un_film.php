<?php
include "parts/initial_page.php";
allowOnlyGestore();
$film = FilmManager::get_from_id(@$_GET["id"]);
$_REQUEST["film"] = $film;
include "views/gestione/Form di modifica film.php";

$artista_dao = ArtistaDAOFactory::getArtistaDAO();
$_REQUEST["artisti"] = $artista_dao->get_all();
unset($artista_dao);
$_REQUEST["recitazioni"] = RecitazioneManager::get_from_film($film->getID());
$_REQUEST["registi"] = RegiaManager::get_artisti_from_film($film->getID());
include "views/gestione/Form di aggiornamento artisti in film.php";

$_REQUEST["generi"] = GenereManager::get_all();
$_REQUEST["film_generi"] = GenereManager::get_generi_from_film($film->getID());
include "views/gestione/Form di aggiornamento generi di film.php";