<?php

include "../../php/core.php";

assert(Auth::getLoggedUser());

$film_id = trim(@$_POST["film_id"]);
$final_genres = [];
foreach ($_POST as $key => $val)
	if (Formats\startswith("gen_", $key) and $val === "on")
		$final_genres[] = substr($key, 4);
print_r($final_genres);


if (!$film = FilmManager::get_from_id($film_id))
	echo "Il client non ti ha bloccato?";
elseif (GenereManager::set_only($film->getID(), $final_genres))
	header("Location: /film.php?id=" . $film->getID());
else
	echo "Errore interno";

/*
if (!$valid)
	echo "Il client non ti ha bloccato?";
if (!$film = FilmManager::get_from_id($film_id))
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

}*/