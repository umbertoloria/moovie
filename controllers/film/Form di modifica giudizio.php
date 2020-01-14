<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = $_GET["film_id"];
unset($_GET["film_id"]);

$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!$giudizio = $giudizio_dao->get_from_utente_and_film($logged_user->getID(), $film_id))
	echo "Il client non ti ha bloccato?";
else {
	unset($logged_user);
	unset($film_id);
	$_REQUEST["giudizio"] = $giudizio;
	unset($giudizio);
	include "../../views/film/Form di modifica giudizio.php";
}