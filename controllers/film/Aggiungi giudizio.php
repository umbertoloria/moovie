<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$id = @$_POST["id"];
$voto = @$_POST["voto"];

$valid = Validator\validate("../../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($id))
	echo "dammi un numero per id";
else {

	$tmp_giudizio = new Giudizio(
		$logged_user->getID(),
		$id,
		$voto,
		""
	);

	if (GiudizioManager::create($tmp_giudizio))
		header("Location: /film.php?id=" . $id);
	else
		echo "Errore interno";

}