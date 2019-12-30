<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($film_id))
	echo "dammi un numero per id";
elseif (!$giudizio = GiudizioManager::get_from_utente_and_film($logged_user->getID(), $film_id))
	echo "Il client non ti ha bloccato?";
elseif (GiudizioManager::drop($giudizio))
	header("Location: /giudizi.php");
else
	echo "Errore interno";