<?php

include "../../php/core.php";

$id = @$_GET["id"];
$logged_user = Auth::getLoggedUser();
if (!ctype_digit($id))
	echo "Errore interno";
elseif (!$logged_user)
	echo "Accedi per usare questa funzionalità";
else {

	$amici = [];
	foreach (AmiciziaManager::getFriendships($logged_user->getID()) as $amicizia) {
		$uid = $amicizia->getUtenteFrom() === $logged_user->getID()
			? $amicizia->getUtenteTo()
			: $amicizia->getUtenteFrom();
		if (!AmiciziaManager::existsSuggestion($logged_user->getID(), $uid, $id))
			$amici[] = AccountManager::doRetrieveByID($uid);
	}

	if (empty($amici))
		die("Hai già suggerito questo film a tutti i tuoi amici");

	$_REQUEST["id"] = $id;
	$_REQUEST["amici"] = $amici;
	unset($_GET["id"]);
	unset($id);
	unset($logged_user);
	unset($amici);

	include "../../views/amicizie/Form di selezione amici da suggerire.php";

}