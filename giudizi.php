<?php
// Visualizza giudizi
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /");
	die();
}

$films = [];
$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
$giudizi = $giudizio_dao->findByUtenti([$logged_user->getID()]);
$film_dao = FilmDAOFactory::getFilmDAO();
foreach ($giudizi as $giudizio)
	if (!isset($films[$giudizio->getFilm()]))
		$films[$giudizio->getFilm()] = $film_dao->findByID($giudizio->getFilm());
unset($film_dao);
$_REQUEST["films"] = $films;
$_REQUEST["giudizi"] = $giudizi;
unset($logged_user);
unset($giudizio);
unset($films);

include "views/film/Pagina giudizi.php";