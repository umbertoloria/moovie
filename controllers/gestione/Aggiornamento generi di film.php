<?php

include_once "../../php/core.php";

$utente = Auth::getLoggedUser();
if (is_null($utente) or !$utente->isGestore()) {
	Testing::redirect("/");
	return;
}

$film_id = trim(@$_POST["film_id"]);
$final_genres = [];
foreach ($_POST as $key => $val)
	if (Formats\startswith("gen_", $key) and $val === "on")
		$final_genres[] = substr($key, 4);

$ff = new FormFeedbacker();

$film_dao = FilmDAOFactory::getFilmDAO();
$genere_dao = GenereDAOFactory::getGenereDAO();

if (!$film = $film_dao->findByID($film_id))
	$ff->block();
elseif ($genere_dao->setOnly($film->getID(), $final_genres)) {
	Testing::redirect("/film.php?id=" . $film->getID());
	return;
} else
	$ff->bug();

$ff->process();