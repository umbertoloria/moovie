<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$lista = ListaManager::doRetrieveByID($id)) {
	print("lista non trovata");
} else {
	unset($id);
	$films = [];
	// Sono sicuro che non ci saranno doppioni
	foreach ($lista->getFilms() as $film_id) {
		$films[$film_id] = FilmManager::doRetrieveByID($film_id);
	}
	$_REQUEST["lista"] = $lista;
	$_REQUEST["films"] = $films;
	unset($lista);
	unset($films);
	include "views/Pagina lista.php";
}