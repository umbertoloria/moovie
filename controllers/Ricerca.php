<?php

include "../php/core.php";

$kind = @$_GET["kind"];
$fulltext = @$_GET["fulltext"];

$risultati = [];

$ids = range(1, 16);
$to_download = [];
foreach (range(1, 6) as $_) {
	while (!in_array($i = rand(1, count($ids)), $ids)) ;
	array_splice($ids, array_search($i, $ids), 1);
	array_push($to_download, $i);
}

unset($fulltext);

if ($kind === "movies") {
	// GenereID => GenereOBJ
	$generi = [];
	// FilmID => [GenereID1, GenereID2, ...]
	$film_generi = [];

	// ArtistaID => ArtistaOBJ
	$artisti = [];
	// FilmID => [ArtistaID1, ArtistaID2, ...]
	$film_artisti = [];
	foreach ($to_download as $id) {
		$film = FilmManager::doRetrieveByID($id);
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
	foreach ($to_download as $id) {
		$artista = ArtistaManager::doRetrieveByID($id);
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
	// TODO: implementami ti prego (insieme al mio amico in /views/Risultati di ricerca.php)
} else {
	header("Location: /404.php");
	die();
}

unset($kind);
include "../parts/head.php";
include "../parts/leftmenu.php";
include "../parts/topmenu.php";
$_REQUEST["risultati"] = $risultati;
unset($risultati);
include "../views/Risultati di ricerca.php";