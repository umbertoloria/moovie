<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	echo "non mi hai dato un id";
} elseif (!ctype_digit($id)) {
	echo "dammi un numero per id";
} elseif (!$film = FilmManager::doRetrieveByID($id)) {
	echo "film non trovato";
} else {
	unset($id);
	$artisti = [];
	$recitazioni = RecitazioneManager::doRetrieveByFilm($film->getID());
	foreach ($recitazioni as $recitazione) {
		if (!array_key_exists($recitazione->getAttore(), $artisti)) {
			$artisti[$recitazione->getAttore()] = ArtistaManager::doRetrieveByID($recitazione->getAttore());
		}
	}
	$registi = RegiaManager::get_artisti_from_film($film->getID());
	foreach ($registi as $regista) {
		if (!array_key_exists($regista, $artisti)) {
			$artisti[$regista] = ArtistaManager::doRetrieveByID($regista);
		}
	}
	$_REQUEST["film"] = $film;
	$_REQUEST["recitazioni"] = $recitazioni;
	$_REQUEST["registi"] = $registi;
	$_REQUEST["artisti"] = $artisti;
	$_REQUEST["generi"] = GenereManager::doRetrieveByFilm($film->getID());

	$_REQUEST["show_actions"] = [];
	$logged_user = Auth::getLoggedUser();
	if ($logged_user) {
		// TODO: Se hai almeno un amico...
		$_REQUEST["show_actions"][] = "suggest";
		if (!FilmGuardatiManager::exists($logged_user->getID(), $film->getID()))
			$_REQUEST["show_actions"][] = "add_film_guardato";
		if (!FilmDaGuardareManager::exists($logged_user->getID(), $film->getID()))
			$_REQUEST["show_actions"][] = "add_film_da_guardare";
		if (!empty(ListaManager::getAllOf($logged_user->getID())))
			$_REQUEST["show_actions"][] = "add_to_liste";
	}
	unset($logged_user);

	unset($film);
	unset($recitazioni);
	unset($registi);
	unset($artisti);
	include "views/Pagina film.php";
}