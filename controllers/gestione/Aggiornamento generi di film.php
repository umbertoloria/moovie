<?php

include "../../php/core.php";

allowOnlyGestore();

$film_id = trim(@$_POST["film_id"]);
$final_genres = [];
foreach ($_POST as $key => $val)
	if (Formats\startswith("gen_", $key) and $val === "on")
		$final_genres[] = substr($key, 4);

$ff = new FormFeedbacker();

$film_dao = FilmDAOFactory::getFilmDAO();
$genere_dao = GenereDAOFactory::getGenereDAO();

if (!$film = $film_dao->get_from_id($film_id))
	$ff->message("Il client non ti ha bloccato?");
elseif ($genere_dao->set_only($film->getID(), $final_genres))
	header("Location: /film.php?id=" . $film->getID());
else
	$ff->bug();

$ff->process();