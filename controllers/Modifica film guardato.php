<?php

include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$film_id = @$_POST["film_id"];
$voto = @$_POST["voto"];

$valid = Validator\validate("../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($film_id))
	echo "film non trovato";
elseif (FilmGuardatiManager::edit($logged_user->getID(), $film_id, $voto))
	header("Location: /film_guardati.php");
else
	echo "Errore interno";