<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_POST["film_id"];
$voto = @$_POST["voto"];

$valid = Validator\validate("../../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

$ff = new FormFeedbacker();

if (!$logged_user or !$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (!ctype_digit($film_id))
	$ff->message("dammi un numero per id");
else {
	$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
	$tmp_giudizio = new Giudizio($logged_user->getID(), $film_id, $voto, "");
	if ($giudizio_dao->create($tmp_giudizio))
		header("Location: /film.php?id=" . $film_id);
	else
		$ff->bug();
}

$ff->process();