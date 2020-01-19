<?php
// Visualizza genere
include "parts/initial_page.php";
$genere_dao = GenereDAOFactory::getGenereDAO();
$genere = $genere_dao->findByID(@$_GET["id"]);
if (!$genere) {
	header("Location: /404.php");
	die();
}

$films = [];
$genere_films = $genere_dao->findFilmsByGenere($genere->getID());
unset($genere_dao);
$film_dao = FilmDAOFactory::getFilmDAO();
foreach ($genere_films as $film_id)
	if (!isset($films[$film_id]))
		$films[$film_id] = $film_dao->findByID($film_id);
unset($film_dao);
$_REQUEST["genere"] = $genere;
$_REQUEST["films"] = $films;
$_REQUEST["genere_films"] = $genere_films;

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user and $logged_user->isGestore()) {
	$_REQUEST["show_actions"][] = "update";
	$_REQUEST["show_actions"][] = "delete";
}
unset($logged_user);

unset($genere);
unset($films);
unset($genere_films);
include "views/film/Pagina genere.php";