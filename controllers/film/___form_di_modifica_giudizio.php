<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
else {
	$id = $_GET["id"];
	$_REQUEST["id"] = $id;
	$film_guardato = FilmGuardatiManager::doRetrieveByUtenteAndFilm($logged_user->getID(), $id);
	$_REQUEST["selected"] = $film_guardato->getVoto();
	unset($logged_user);
	unset($_GET['id']);
	unset($id);
	unset($film_guardato);
	include "../../views/film/Form di modifica giudizio.php";
}