<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
else {
	$id = $_GET["id"];
	$_REQUEST["id"] = $id;
	$giudizio = GiudizioManager::doRetrieveByUtenteAndFilm($logged_user->getID(), $id);
	$_REQUEST["selected"] = $giudizio->getVoto();
	unset($logged_user);
	unset($_GET['id']);
	unset($id);
	unset($giudizio);
	include "../../views/film/Form di modifica giudizio.php";
}