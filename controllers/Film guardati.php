<?php

include "../php/core.php";

$film_id = @$_POST["film_id"];
assert(ctype_digit($film_id));
$voto = @$_POST["voto"];

$valid = Validator\validate("../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
else {

	$logged_user = Auth::getLoggedUser();
	assert($logged_user);
	$kind = trim(@$_POST["kind"]);

	if ($kind === "add") {

		if (FilmGuardatiManager::add($logged_user->getID(), $film_id, $voto))
			header("Location: /film.php?id=" . $film_id);
		else
			echo "ops";

	} elseif ($kind === "edit") {

		if (FilmGuardatiManager::edit($logged_user->getID(), $film_id, $voto))
			header("Location: /film_guardati.php");
		else
			echo "ops";

	} else
		echo "Non so che fare...";

}