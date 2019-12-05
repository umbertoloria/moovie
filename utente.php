<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	echo "non mi hai dato un id";
} elseif (!ctype_digit($id)) {
	echo "dammi un numero per id";
} elseif (!$utente = AccountManager::doRetrieveByID($id)) {
	echo "utente non trovato";
} else {
	unset($id);
	$tutte_liste = ListaManager::getAllOf($utente->getID());
	$liste = [];
	$logged_user = Auth::getLoggedUser();
	if ($logged_user === null || $logged_user->getID() !== $utente->getID()) {
		// Se non sono il proprietario di questo account, posso vedere solo "tutti" o "amici" (se amico)
		foreach ($tutte_liste as $lista) {
			if ($lista->getVisibilità() === "solo_tu")
				continue;
			if ($lista->getVisibilità() === "tutti")
				$liste[] = $lista;
			elseif ($lista->getVisibilità() === "amici")
				// TODO: Controlla se sono amici...
				$liste[] = $lista;
		}
		unset($logged_user);
	} else {
		$liste = $tutte_liste;
	}
	unset($tutte_liste);
	$_REQUEST["utente"] = $utente;
	$_REQUEST["liste"] = $liste;
	unset($utente);
	include "views/Pagina utente.php";
}