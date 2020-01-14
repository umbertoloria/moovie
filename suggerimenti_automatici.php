<?php
// Suggerimenti automatici
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /");
	die();
}
$film_dao = FilmDAOFactory::getFilmDAO();
$_REQUEST["films"] = $film_dao->suggest_me($logged_user->getID());
unset($film_dao);
include "views/film/Pagina suggerimenti.php";