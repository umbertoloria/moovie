<?php
// Visualizza artista
include "parts/initial_page.php";
$artista = ArtistaManager::get_from_id(@$_GET["id"]);
if (!$artista) {
	header("Location: /404.php");
	die();
}

$films = [];
$recitazioni = RecitazioneManager::get_from_artist($artista->getID());
foreach ($recitazioni as $recitazione) {
	if (!array_key_exists($recitazione->getFilm(), $films)) {
		$films[$recitazione->getFilm()] = FilmManager::get_from_id($recitazione->getFilm());
	}
}
$registi = RegiaManager::get_films_from_artista($artista->getID());
foreach ($registi as $regista) {
	if (!array_key_exists($regista, $films)) {
		$films[$regista] = FilmManager::get_from_id($regista);
	}
}
$_REQUEST["artista"] = $artista;
$_REQUEST["recitazioni"] = $recitazioni;
$_REQUEST["registi"] = $registi;
$_REQUEST["films"] = $films;
unset($artista);
unset($recitazioni);
unset($registi);
unset($films);

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user and $logged_user->isGestore()) {
	$_REQUEST["show_actions"][] = "update";
	$_REQUEST["show_actions"][] = "delete";
}
unset($logged_user);

include "views/Pagina artista.php";