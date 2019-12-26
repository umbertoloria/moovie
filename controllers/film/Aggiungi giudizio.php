<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_POST["film_id"];
$voto = @$_POST["voto"];

$valid = Validator\validate("../../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

if (!$logged_user or !$valid)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($film_id))
	echo "dammi un numero per id";
else {

	$tmp_giudizio = new Giudizio($logged_user->getID(), $film_id, $voto, "");
	if (GiudizioManager::create($tmp_giudizio))
		header("Location: /film.php?id=" . $film_id);
	else
		echo "Errore interno";

}