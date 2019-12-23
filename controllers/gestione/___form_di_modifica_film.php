<?php

include "../../php/core.php";

$id = trim(@$_POST["id"]);
$titolo = trim(@$_POST["titolo"]);
$durata = trim(@$_POST["durata"]);
$anno = trim(@$_POST["anno"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_film.json", [
	"titolo" => $titolo,
	"durata" => $durata,
	"anno" => $anno,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
if (!$film = FilmManager::get_from_id($id))
	echo "Il client non ti ha bloccato?";
else {

	$min_sec = explode(":", $durata);
	$durata = $min_sec[0] * 60 + $min_sec[1];

	$film->setTitolo($titolo);
	$film->setDurata($durata);
	$film->setAnno($anno);
	$film->setDescrizione($descrizione);

	$saved_film = FilmManager::update($film);
	if ($saved_film) {
		header("Location: /film.php?id=" . $saved_film->getID());
	} else {
		echo "Errore interno";
	}

}