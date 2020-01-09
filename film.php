<?php
// Visualizza film
include "parts/initial_page.php";
$film = FilmManager::get_from_id(@$_GET["id"]);
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
foreach ($artisti as $artista_id => $_)
	$artisti[$artista_id] = ArtistaManager::get_from_id($artista_id);
$_REQUEST["artisti"] = $artisti;
unset($recitazioni);
unset($registi);
unset($artisti);

$_REQUEST["generi"] = GenereManager::get_from_film($film->getID());

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user) {
	if (!GiudizioManager::exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_giudizio";
	if (!PromemoriaManager::exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_promemoria";
	if ($logged_user->isGestore()) {
		$_REQUEST["show_actions"][] = "update";
		$_REQUEST["show_actions"][] = "delete";
	}
}
unset($logged_user);

$_REQUEST["film"] = $film;
unset($film);

include "views/Pagina film.php";