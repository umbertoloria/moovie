<?php

include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);
$film_id = @$_POST["film_id"];
$voto = @$_POST["voto"];
assert(ctype_digit($film_id));
assert(ctype_digit($voto));
if (FilmGuardatiManager::add($logged_user->getID(), $film_id, $voto))
	header("Location: /film.php?id=" . $film_id);
else
	echo "ops";