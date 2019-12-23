<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user);

$films = [];
$giudizi = GiudizioManager::getAllOf($logged_user->getID());
foreach ($giudizi as $giudizio)
	if (!isset($films[$giudizio->getFilm()]))
		$films[$giudizio->getFilm()] = FilmManager::doRetrieveByID($giudizio->getFilm());
$_REQUEST["films"] = $films;
$_REQUEST["giudizi"] = $giudizi;
unset($logged_user);
unset($giudizio);
unset($films);

include "views/film/Pagina giudizi.php";