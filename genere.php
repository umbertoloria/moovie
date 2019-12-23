<?php
include "parts/initial_page.php";
$genere = GenereManager::doRetrieveByID(@$_GET["id"]);
if (!$genere) {
	header("Location: /404.php");
	die();
}

$films = [];
$genere_films = GenereManager::get_films_from_genere($genere->getID());
foreach ($genere_films as $film_id)
	if (!isset($films[$film_id]))
		$films[$film_id] = FilmManager::doRetrieveByID($film_id);
$_REQUEST["genere"] = $genere;
$_REQUEST["films"] = $films;
$_REQUEST["genere_films"] = $genere_films;
unset($genere);
unset($films);
unset($genere_films);
include "views/Pagina genere.php";