<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	echo "non mi hai dato un id";
} elseif (!ctype_digit($id)) {
	echo "dammi un numero per id";
} elseif (!$utente = AccountManager::get_from_id($id)) {
	echo "utente non trovato";
} else {
	unset($id);

	$logged_user = Auth::getLoggedUser();
	$_REQUEST["show_actions"] = [];
	if ($logged_user and $logged_user->getID() !== $utente->getID()) {
		if (AmiciziaManager::existsFriendshipBetween($logged_user->getID(), $utente->getID())) {
			// Esiste una amicizia accettata
			$_REQUEST["show_actions"][] = "remove_friendship";
		} elseif (AmiciziaManager::existsRequestFromTo($utente->getID(), $logged_user->getID())) {
			// Questo utente mi ha mandato una richiesta
			$_REQUEST["show_actions"][] = "accept_friendship";
			$_REQUEST["show_actions"][] = "refuse_friendship";
		} elseif (AmiciziaManager::existsRequestFromTo($logged_user->getID(), $utente->getID())) {
			// Io ho mandato una richiesta a questo utente
			$_REQUEST["show_actions"][] = "remove_friendship_request";
		} else {
			// Non esiste nessuna amicizia né richiesta tra di noi
			$_REQUEST["show_actions"][] = "request_friendship";
		}
	}
	unset($logged_user);

	$_REQUEST["utente"] = $utente;
	unset($utente);

	include "views/Pagina utente.php";
}