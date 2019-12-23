<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
$film = FilmManager::get_from_id(@$_GET["id"]);
$artisti = [];
$recitazioni = RecitazioneManager::get_from_film($film->getID());
foreach ($recitazioni as $recitazione)
	if (!isset($artisti[$recitazione->getAttore()]))
		$artisti[$recitazione->getAttore()] = ArtistaManager::get_from_id($recitazione->getAttore());
$regie = RegiaManager::get_artisti_from_film($film->getID());
foreach ($regie as $regia)
	if (!isset($artisti[$regia]))
		$artisti[$regia] = ArtistaManager::get_from_id($regia);
$_REQUEST["film"] = $film;
include "views/gestione/___form_di_modifica_film.php";
$_REQUEST["artisti"] = $artisti;
$_REQUEST["recitazioni"] = $recitazioni;
$_REQUEST["regie"] = $regie;
include "views/gestione/___form_di_aggiornamento_partecipazioni_film.php";
$generi = [];
$fhgs = GenereManager::get_generi_from_film($film->getID());
foreach ($fhgs as $fhg)
	if (!isset($generi[$fhg]))
		$generi[$fhg] = GenereManager::doRetrieveByID($fhg);
$_REQUEST["generi"] = $generi;
$_REQUEST["fhgs"] = $fhgs;
include "views/gestione/___form_di_aggiornamento_generi_film.php";