<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if ($logged_user) {

	$films = [];
	$films_da_guardare = FilmDaGuardareManager::get($logged_user->getID());
	foreach ($films_da_guardare as $film_da_guardare)
		if (!isset($films[$film_da_guardare->getFilm()]))
			$films[$film_da_guardare->getFilm()] = FilmManager::doRetrieveByID($film_da_guardare->getFilm());
	$_REQUEST["films"] = $films;
	$_REQUEST["films_da_guardare"] = $films_da_guardare;
	unset($logged_user);
	unset($film_guardato);
	unset($films);
	include "views/___film_da_guardare.php";

}