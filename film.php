<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$film = FilmManager::doRetrieveByID($id)) {
	print("film non trovato");
} else {
	$artisti = [];
	$recitazioni = RecitazioneManager::doRetrieveByFilm($film->getID());
	foreach ($recitazioni as $recitazione) {
		if (!array_key_exists($recitazione->getAttore(), $artisti)) {
			$artisti[$recitazione->getAttore()] = ArtistaManager::doRetrieveByID($recitazione->getAttore());
		}
	}
	$regie = RegiaManager::doRetrieveByFilm($film->getID());
	foreach ($regie as $regia) {
		if (!array_key_exists($regia->getRegista(), $artisti)) {
			$artisti[$regia->getRegista()] = ArtistaManager::doRetrieveByID($regia->getRegista());
		}
	}
	$_REQUEST["film"] = $film;
	$_REQUEST["recitazioni"] = $recitazioni;
	$_REQUEST["regie"] = $regie;
	$_REQUEST["artisti"] = $artisti;
	$_REQUEST["generi"] = GenereManager::doRetrieveByFilm($film->getID());
	unset($film);
	unset($recitazioni);
	unset($regie);
	unset($artisti);
	include "views/Pagina film.php";
}