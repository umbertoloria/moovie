<?php
// Visualizza film
include "parts/initial_page.php";
$film_dao = FilmDAOFactory::getFilmDAO();
$film = $film_dao->get_from_id(@$_GET["id"]);
unset($film_dao);
if (!$film) {
	header("Location: /404.php");
	die();
}

$recitazioni = RecitazioneManager::get_from_film($film->getID());
$registi = RegiaManager::get_artisti_from_film($film->getID());
$_REQUEST["recitazioni"] = $recitazioni;
$_REQUEST["registi"] = $registi;

$artisti = [];
foreach ($recitazioni as $recitazione)
	$artisti[$recitazione->getAttore()] = null;
foreach ($registi as $regista)
	$artisti[$regista] = null;
$artista_dao = ArtistaDAOFactory::getArtistaDAO();
foreach ($artisti as $artista_id => $_)
	$artisti[$artista_id] = $artista_dao->get_from_id($artista_id);
unset($artista_dao);
$_REQUEST["artisti"] = $artisti;
unset($recitazioni);
unset($registi);
unset($artisti);

$genere_dao = GenereDAOFactory::getGenereDAO();
$_REQUEST["generi"] = $genere_dao->get_from_film($film->getID());
unset($genere_dao);

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user) {
	$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
	if (!$giudizio_dao->exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_giudizio";
	$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
	if (!$promemoria_dao->exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_promemoria";
	unset($promemoria_dao);
	if ($logged_user->isGestore()) {
		$_REQUEST["show_actions"][] = "update";
		$_REQUEST["show_actions"][] = "delete";
	}
	unset($giudizio_dao);
}
unset($logged_user);

$_REQUEST["film"] = $film;
unset($film);

include "views/Pagina film.php";