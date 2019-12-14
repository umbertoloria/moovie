<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Accedi per usare questa funzionalità";
else {

	$suggerimenti = AmiciziaManager::getSuggestionsTo($logged_user->getID());
	$films = [];
	$users = [];
	foreach ($suggerimenti as $suggerimento) {
		if (!isset($films[$suggerimento->getFilm()]))
			$films[$suggerimento->getFilm()] = FilmManager::doRetrieveByID($suggerimento->getFilm());
		if (!isset($users[$suggerimento->getUtenteFrom()]))
			$users[$suggerimento->getUtenteFrom()] = AccountManager::doRetrieveByID($suggerimento->getUtenteFrom());
	}

	$_REQUEST["suggerimenti"] = $suggerimenti;
	$_REQUEST["films"] = $films;
	$_REQUEST["users"] = $users;
	unset($logged_user);
	unset($suggerimenti);
	unset($films);
	unset($users);

	include "../../views/amicizie/___area_suggerimenti_di_film.php";

}