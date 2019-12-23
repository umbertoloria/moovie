<?php
include "parts/initial_page.php";
$artista = ArtistaManager::doRetrieveByID(@$_GET["id"]);
if (!$artista) {
	header("Location: /404.php");
	die();
}

$films = [];
$recitazioni = RecitazioneManager::doRetrieveByAttore($artista->getID());
foreach ($recitazioni as $recitazione) {
	if (!array_key_exists($recitazione->getFilm(), $films)) {
		$films[$recitazione->getFilm()] = FilmManager::doRetrieveByID($recitazione->getFilm());
	}
}
$registi = RegiaManager::get_films_from_artista($artista->getID());
foreach ($registi as $regista) {
	if (!array_key_exists($regista, $films)) {
		$films[$regista] = FilmManager::doRetrieveByID($regista);
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
include "views/Pagina artista.php";