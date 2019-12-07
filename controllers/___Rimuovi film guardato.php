<?php

include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$film_id = @$_GET["film_id"];
assert(ctype_digit($film_id));

if (FilmGuardatiManager::drop($logged_user->getID(), $film_id))
	header("Location: /film_guardati.php");
else
	echo "ops";