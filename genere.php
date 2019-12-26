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
		$films[$film_id] = FilmManager::get_from_id($film_id);
$_REQUEST["genere"] = $genere;
$_REQUEST["films"] = $films;
$_REQUEST["genere_films"] = $genere_films;

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user and $logged_user->isGestore()) {
	$_REQUEST["show_actions"][] = "update";
	$_REQUEST["show_actions"][] = "delete";
}
unset($logged_user);

unset($genere);
unset($films);
unset($genere_films);
include "views/Pagina genere.php";