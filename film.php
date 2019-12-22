<?php
include "parts/initial_page.php";
$film = FilmManager::doRetrieveByID(@$_GET["id"]);
if (!$film)
	die("film non trovato");

$recitazioni = RecitazioneManager::doRetrieveByFilm($film->getID());
$registi = RegiaManager::get_artisti_from_film($film->getID());
$_REQUEST["recitazioni"] = $recitazioni;
$_REQUEST["registi"] = $registi;

$artisti = [];
foreach ($recitazioni as $recitazione)
	$artisti[$recitazione->getAttore()] = null;
foreach ($registi as $regista)
	$artisti[$regista] = null;
foreach ($artisti as $artista_id => $_)
	$artisti[$artista_id] = ArtistaManager::doRetrieveByID($artista_id);
$_REQUEST["artisti"] = $artisti;
unset($recitazioni);
unset($registi);
unset($artisti);

$_REQUEST["generi"] = GenereManager::doRetrieveByFilm($film->getID());

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user) {
	// FIXME: Spreco di memoria!
	if (count(AmiciziaManager::getFriendships($logged_user->getID())) > 0)
		$_REQUEST["show_actions"][] = "suggest";
	if (!FilmGuardatiManager::exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_film_guardato";
	if (!FilmDaGuardareManager::exists($logged_user->getID(), $film->getID()))
		$_REQUEST["show_actions"][] = "add_film_da_guardare";
	if (!empty(ListaManager::getAllOf($logged_user->getID())))
		$_REQUEST["show_actions"][] = "add_to_liste";
}
unset($logged_user);

$_REQUEST["film"] = $film;
unset($film);
include "views/Pagina film.php";