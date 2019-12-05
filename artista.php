<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	echo "non mi hai dato un id";
} elseif (!ctype_digit($id)) {
	echo "dammi un numero per id";
} elseif (!$artista = ArtistaManager::doRetrieveByID($id)) {
	echo "artista non trovato";
} else {
	unset($id);
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
}