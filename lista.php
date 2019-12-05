<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	echo "non mi hai dato un id";
} elseif (!ctype_digit($id)) {
	echo "dammi un numero per id";
} elseif (!$lista = ListaManager::doRetrieveByID($id)) {
	echo "lista non trovata";
} else {
	unset($id);

	if ($lista->getVisibilità() !== "tutti") {
		$logged_user = Auth::getLoggedUser();
		if (!$logged_user) {
			header("Location: /404.php");
			die();
		} elseif ($lista->getVisibilità() === "amici" && $logged_user->getID() !== $lista->getProprietario()) {
			// TODO: Verifica l'amicizia...
		} elseif ($lista->getVisibilità() === "solo_tu" && $logged_user->getID() !== $lista->getProprietario()) {
			header("Location: /404.php");
			die();
		}
	}

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