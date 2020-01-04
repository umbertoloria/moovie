<?php

include "../../php/core.php";

assert(Auth::getLoggedUser());

$film_id = trim(@$_POST["film_id"]);
$final_genres = [];
foreach ($_POST as $key => $val)
	if (Formats\startswith("gen_", $key) and $val === "on")
		$final_genres[] = substr($key, 4);

if (!$film = FilmManager::get_from_id($film_id))
	echo "Il client non ti ha bloccato?";
elseif (GenereManager::set_only($film->getID(), $final_genres))
	header("Location: /film.php?id=" . $film->getID());
else
	echo "Errore interno";