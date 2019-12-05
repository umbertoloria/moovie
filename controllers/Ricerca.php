<?php

include "../php/core.php";

$kind = @$_GET["kind"];
$fulltext = @$_GET["fulltext"];
$risultati = [];

if ($kind === "movies") {
	// GenereID => GenereOBJ
	$generi = [];
	// FilmID => [GenereID1, GenereID2, ...]
	$film_generi = [];
	// ArtistaID => ArtistaOBJ
	$artisti = [];
	// FilmID => [ArtistaID1, ArtistaID2, ...]
	$film_artisti = [];
	foreach (FilmManager::search($fulltext) as $film) {
		$film_generi[$film->getID()] = [];
		foreach (GenereManager::get_generi_from_film($film->getID()) as $genere_id) {
			$film_generi[$film->getID()][] = $genere_id;
			if (!isset($generi[$genere_id]))
				$generi[$genere_id] = GenereManager::doRetrieveByID($genere_id);
		}
		$film_artisti[$film->getID()] = [];
		foreach (RecitazioneManager::doRetrieveByFilm($film->getID()) as $recitazione) {
			$film_artisti[$film->getID()][] = $recitazione->getAttore();
			if (!isset($artisti[$recitazione->getAttore()]))
				$artisti[$recitazione->getAttore()] = ArtistaManager::doRetrieveByID($recitazione->getAttore());
		}
		foreach (RegiaManager::get_artisti_from_film($film->getID()) as $film_id) {
			// Stavolta un regista potrebbe essere già tra gli artisti, avendo magari anche recitato in questo film
			if (array_search($film_id, $film_artisti[$film->getID()]) === false)
				$film_artisti[$film->getID()][] = $film_id;
			if (!isset($artisti[$film_id]))
				$artisti[$film_id] = ArtistaManager::doRetrieveByID($film_id);
		}
		$risultati[] = $film;
	}
	$_REQUEST["generi"] = $generi;
	$_REQUEST["film_generi"] = $film_generi;
	$_REQUEST["artisti"] = $artisti;
	$_REQUEST["film_artisti"] = $film_artisti;
	unset($generi);
	unset($film_generi);
	unset($artisti);
	unset($film_artisti);
} elseif ($kind === "artists") {
	$films = [];
	$artista_films = [];
	foreach (ArtistaManager::search($fulltext) as $artista) {
		$artista_films[$artista->getID()] = [];
		foreach (RecitazioneManager::doRetrieveByAttore($artista->getID()) as $recitazione) {
			$artista_films[$artista->getID()][] = $recitazione->getFilm();
			if (!isset($films[$recitazione->getFilm()]))
				$films[$recitazione->getFilm()] = FilmManager::doRetrieveByID($recitazione->getFilm());
		}
		foreach (RegiaManager::get_films_from_artista($artista->getID()) as $film_id) {
			// Magari un film potrebbe già essere registrato, magari perché ci ha recitato e poi curato la regia
			if (array_search($film_id, $artista_films[$artista->getID()]) === false)
				$artista_films[$artista->getID()][] = $film_id;
			if (!isset($films[$film_id]))
				$films[$film_id] = FilmManager::doRetrieveByID($film_id);
		}
		$risultati[] = $artista;
	}
	$_REQUEST["films"] = $films;
	$_REQUEST["artista_films"] = $artista_films;
	unset($films);
	unset($artista);
} elseif ($kind === "users") {
	foreach (AccountManager::search($fulltext) as $user) {
		assert($user instanceof Utente);
		$risultati[] = $user;
	}
} else {
	header("Location: /404.php");
	die();
}

unset($kind);
unset($fulltext);
include "../parts/head.php";
include "../parts/leftmenu.php";
include "../parts/topmenu.php";
$_REQUEST["risultati"] = $risultati;
unset($risultati);
include "../views/Risultati di ricerca.php";