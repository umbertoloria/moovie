<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = $_GET["film_id"];

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!$giudizio = GiudizioManager::get_from_utente_and_film($logged_user->getID(), $film_id))
	echo "Il client non ti ha bloccato?";
else {
	$_REQUEST["film_id"] = $film_id;
	$_REQUEST["selected"] = $giudizio->getVoto();
	unset($logged_user);
	unset($_GET['id']);
	unset($film_id);
	unset($giudizio);
	include "../../views/film/Form di modifica giudizio.php";
}