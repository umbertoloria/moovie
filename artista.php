<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$artista = ArtistaManager::doRetrieveByID($id)) {
	print("artista non trovato");
} else {
	$films = [];
	$recitazioni = RecitazioneManager::doRetrieveByAttore($artista->getID());
	$regie = RegiaManager::doRetrieveByRegista($artista->getID());
	foreach ($recitazioni as $recitazione) {
		if (!array_key_exists($recitazione->getFilm(), $films)) {
			$films[$recitazione->getFilm()] = FilmManager::doRetrieveByID($recitazione->getFilm());
		}
	}
	foreach ($regie as $regia) {
		if (!array_key_exists($regia->getFilm(), $films)) {
			$films[$regia->getFilm()] = FilmManager::doRetrieveByID($regia->getFilm());
		}
	}
	$_REQUEST["artista"] = $artista;
	$_REQUEST["recitazioni"] = $recitazioni;
	$_REQUEST["regie"] = $regie;
	$_REQUEST["films"] = $films;
	unset($artista);
	unset($recitazioni);
	unset($regie);
	unset($films);
	include "views/Pagina artista.php";
}