<?php

$kind = @$_GET["kind"];
$fulltext = @$_GET["fulltext"];

if (!in_array($kind, ["all", "movies", "artists", "users"])) {
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

if ($kind === "movies" or $kind === "all") {

	foreach (FilmManager::search($fulltext) as $film) {
		if (!isset($films_cache[$film->getID()]))
			$films_cache[$film->getID()] = $film;

		$result = [
			"id" => $film->getID(),
			"generi" => GenereManager::get_generi_from_film($film->getID()),
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

}

if ($kind === "artists" or $kind === "all") {

	foreach (ArtistaManager::search($fulltext) as $artista) {
		if (!isset($artisti_cache[$artista->getID()]))
			$artisti_cache[$artista->getID()] = $artista;

		$result = [
			"id" => $artista->getID(),
			"films" => []
		];

		foreach (RecitazioneManager::doRetrieveByAttore($artista->getID()) as $recitazione)
			$result["films"][] = $recitazione->getFilm();

		foreach (RegiaManager::get_films_from_artista($artista->getID()) as $film_id)
			// Magari questo film è già presente tra i film, magari l'artista ha curato sia regia che recitazione
			if (!in_array($film_id, $result["films"]))
				$result["films"][] = $film_id;

		foreach ($result["films"] as $film_id)
			$films_cache[$film_id] = null;

		$risultati["artists"][] = $result;
	}

}

if ($kind === "users" or $kind === "all") {
	$risultati["users"] = AccountManager::search($fulltext);
}
unset($kind);
unset($fulltext);

foreach ($films_cache as $film_id => $value)
	if (!$value)
		$films_cache[$film_id] = FilmManager::get_from_id($film_id);

foreach ($generi_cache as $genere_id => $value)
	if (!$value)
		$generi_cache[$genere_id] = GenereManager::doRetrieveByID($genere_id);

foreach ($artisti_cache as $artista_id => $value)
	if (!$value)
		$artisti_cache[$artista_id] = ArtistaManager::get_from_id($artista_id);

$_REQUEST["risultati"] = $risultati;
unset($risultati);
$_REQUEST["films"] = $films_cache;
unset($films_cache);
$_REQUEST["generi"] = $generi_cache;
unset($generi_cache);
$_REQUEST["artisti"] = $artisti_cache;
unset($artisti_cache);
include "../../views/ricerche/Risultati di ricerca.php";