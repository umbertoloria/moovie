<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$film_id = @$_GET["film_id"];

if (!ctype_digit($film_id))
	echo "dammi un numero per id";
elseif (FilmGuardatiManager::drop($logged_user->getID(), $film_id))
	header("Location: /film_guardati.php");
else
	echo "Errore interno";