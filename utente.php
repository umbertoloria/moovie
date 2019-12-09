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
	$_REQUEST["show_actions"] = [];
	if ($logged_user and $logged_user->getID() !== $utente->getID()) {
		if (AmiciziaManager::existsFriendshipBetween($logged_user->getID(), $utente->getID())) {
			// Esiste una amicizia accettata.
			$_REQUEST["show_actions"][] = "remove_friendship";
		} elseif (AmiciziaManager::existsRequestBetween($logged_user->getID(), $utente->getID())) {
			// Esiste una richiesta di amicizia
			$amicizia = AmiciziaManager::doRetrieveByFromAndTo($utente->getID(), $logged_user->getID());
			if ($amicizia) {
				// Se questo utente mi ha mandato una richiesta, io posso accettarla o rifiutarla
				$_REQUEST["show_actions"][] = "accept_friendship";
				$_REQUEST["show_actions"][] = "refuse_friendship";
			} else {
				$_REQUEST["show_actions"][] = "remove_friendship_request";
			}
		} else {
			// Non esiste nessuna amicizia né richiesta in atto...
			$_REQUEST["show_actions"][] = "request_friendship";
		}


	}
	if (!$logged_user or $logged_user->getID() !== $utente->getID()) {
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