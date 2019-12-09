<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$id = @$_GET["id"];

if (!ctype_digit($id))
	echo "dammi un numero per id";
elseif (FilmGuardatiManager::drop($logged_user->getID(), $id))
	header("Location: /film_guardati.php");
else
	echo "Errore interno";