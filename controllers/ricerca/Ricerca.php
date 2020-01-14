<?php

include "../../php/core.php";
$kind = @$_GET["kind"];
$fulltext = @$_GET["fulltext"];

if (is_null(Auth::getLoggedUser()))
	$kinds = ["tutti", "film", "artisti"];
else
	$kinds = ["tutti", "film", "artisti", "utenti"];

if (!in_array($kind, $kinds)) {
	header("Location: /404.php");
	die();
}

include "../../parts/initial_page.php";

$risultati = [
	"movies" => [],
	"artists" => [],
	"users" => []
];
$films_cache = [];
$generi_cache = [];
$artisti_cache = [];

if ($kind === "film" or $kind === "tutti") {

	$film_dao = FilmDAOFactory::getFilmDAO();
	$genere_dao = GenereDAOFactory::getGenereDAO();
	foreach ($film_dao->search($fulltext) as $film) {
		if (!isset($films_cache[$film->getID()]))
			$films_cache[$film->getID()] = $film;

		$result = [
			"id" => $film->getID(),
			"generi" => $genere_dao->get_generi_from_film($film->getID()),
			"artisti" => []
		];

		foreach ($result["generi"] as $genere_id)
			$generi_cache[$genere_id] = null;

		foreach (RecitazioneManager::get_from_film($film->getID()) as $recitazione)
			$result["artisti"][] = $recitazione->getAttore();

		foreach (RegiaManager::get_artisti_from_film($film->getID()) as $regista_id)
			// Magari questo regista è anche tra gli attori, quindi è già tra gli artisti
			if (!in_array($regista_id, $result["artisti"]))
				$result["artisti"][] = $regista_id;

		foreach ($result["artisti"] as $artista_id)
			$artisti_cache[$artista_id] = null;

		$risultati["movies"][] = $result;
	}
	unset($genere_dao);
	unset($film_dao);

}

if ($kind === "artisti" or $kind === "tutti") {

	$artista_dao = ArtistaDAOFactory::getArtistaDAO();
	foreach ($artista_dao->search($fulltext) as $artista) {
		if (!isset($artisti_cache[$artista->getID()]))
			$artisti_cache[$artista->getID()] = $artista;

		$result = [
			"id" => $artista->getID(),
			"films" => []
		];

		foreach (RecitazioneManager::get_from_artista($artista->getID()) as $recitazione)
			$result["films"][] = $recitazione->getFilm();

		foreach (RegiaManager::get_films_from_artista($artista->getID()) as $film_id)
			// Magari questo film è già presente tra i film, magari l'artista ha curato sia regia che recitazione
			if (!in_array($film_id, $result["films"]))
				$result["films"][] = $film_id;

		foreach ($result["films"] as $film_id)
			$films_cache[$film_id] = null;

		$risultati["artists"][] = $result;
	}
	unset($artista_dao);

}

$account_dao = AccountDAOFactory::getAccountDAO();
if ($kind === "utenti" or ($kind === "tutti" and in_array("utenti", $kinds))) {
	$risultati["users"] = $account_dao->search($fulltext);
}
unset($account_dao);
unset($kind);
unset($fulltext);

$film_dao = FilmDAOFactory::getFilmDAO();
foreach ($films_cache as $film_id => $value)
	if (!$value)
		$films_cache[$film_id] = $film_dao->get_from_id($film_id);
unset($film_dao);

$genere_dao = GenereDAOFactory::getGenereDAO();
foreach ($generi_cache as $genere_id => $value)
	if (!$value)
		$generi_cache[$genere_id] = $genere_dao->get_from_id($genere_id);
unset($genere_dao);

$artista_dao = ArtistaDAOFactory::getArtistaDAO();
foreach ($artisti_cache as $artista_id => $value)
	if (!$value)
		$artisti_cache[$artista_id] = $artista_dao->get_from_id($artista_id);
unset($artista_dao);

$_REQUEST["risultati"] = $risultati;
unset($risultati);
$_REQUEST["films"] = $films_cache;
unset($films_cache);
$_REQUEST["generi"] = $generi_cache;
unset($generi_cache);
$_REQUEST["artisti"] = $artisti_cache;
unset($artisti_cache);
include "../../views/ricerca/Risultati di ricerca.php";