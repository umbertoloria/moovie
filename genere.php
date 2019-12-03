<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$genere = GenereManager::doRetrieveByID($id)) {
	print("genere non trovato");
} else {
	$genere_films = GenereManager::get_films_from_genere($genere->getID());
	$films = [];
	foreach ($genere_films as $film_id)
		if (!isset($films[$film_id]))
			$films[$film_id] = FilmManager::doRetrieveByID($film_id);
	$_REQUEST["genere"] = $genere;
	$_REQUEST["genere_films"] = $genere_films;
	$_REQUEST["films"] = $films;
	unset($id);
	unset($genere);
	unset($genere_films);
	unset($films);
	include "views/Pagina genere.php";
}