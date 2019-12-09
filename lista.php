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

	$logged_user = Auth::getLoggedUser();
	if ($lista->getVisibilità() !== "tutti") {
		if (!$logged_user) {
			header("Location: /404.php");
			die();
		} elseif ($lista->getVisibilità() === "amici" and $logged_user->getID() !== $lista->getProprietario()) {
			// TODO: Verifica l'amicizia...
		} elseif ($lista->getVisibilità() === "solo_tu" and $logged_user->getID() !== $lista->getProprietario()) {
			header("Location: /404.php");
			die();
		}
	}

	$_REQUEST["lista"] = $lista;
	$_REQUEST["films"] = ListaManager::getFilmsOf($lista->getID());

	$_REQUEST["show_actions"] = [];
	if ($logged_user) {
		if ($logged_user->getID() !== $lista->getProprietario())
			$_REQUEST["show_actions"][] = "follow";
		else {
			$_REQUEST["show_actions"][] = "modify";
			$_REQUEST["show_actions"][] = "delete";
		}
	}
	unset($logged_user);
	unset($lista);
	include "views/Pagina lista.php";
}