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

	$tmp_giudizio = GiudizioManager::get_from_utente_and_film($logged_user->getID(), $film_id);
	if ($tmp_giudizio->getVoto() == $voto)
		header("Location: /giudizi.php");
	else {
		$tmp_giudizio->setVoto($voto);
		if (GiudizioManager::update($tmp_giudizio))
			header("Location: /giudizi.php");
		else
			echo "Errore interno";
	}

}