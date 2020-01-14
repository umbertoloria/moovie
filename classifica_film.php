<?php
// Visualizza classifica film
include "parts/initial_page.php";
$film_dao = FilmDAOFactory::getFilmDAO();
$_REQUEST["films_voti"] = $film_dao->getClassifica();
unset($film_dao);
include "views/film/Classifica film.php";