<?php
include "parts/initial_page.php";
allowOnlyGestore();
$film_dao = FilmDAOFactory::getFilmDAO();
$film = $film_dao->findByID(@$_GET["id"]);
unset($film_dao);
$_REQUEST["film"] = $film;
include "views/gestione/Form di modifica film.php";

$artista_dao = ArtistaDAOFactory::getArtistaDAO();
$_REQUEST["artisti"] = $artista_dao->getAll();
unset($artista_dao);
$recitazione_dao = RecitazioneDAOFactory::getRecitazioneDAO();
$_REQUEST["recitazioni"] = $recitazione_dao->findByFilm($film->getID());
unset($recitazione_dao);
$regia_dao = RegiaDAOFactory::getRegiaDAO();
$_REQUEST["registi"] = $regia_dao->findArtistiByFilm($film->getID());
unset($regia_dao);
include "views/gestione/Form di aggiornamento artisti in film.php";

$genere_dao = GenereDAOFactory::getGenereDAO();
$_REQUEST["generi"] = $genere_dao->getAll();
$_REQUEST["film_generi"] = $genere_dao->findGeneriByFilm($film->getID());
unset($genere_dao);

include "views/gestione/Form di aggiornamento generi di film.php";