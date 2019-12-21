<?php

include "../../php/core.php";

$film_id = @$_GET["film_id"];
$logged_user = Auth::getLoggedUser();
if (!ctype_digit($film_id))
	echo "Errore interno";
elseif (!$logged_user)
	echo "Accedi per usare questa funzionalità";
else {

	$amici = [];
	foreach (AmiciziaManager::getFriendships($logged_user->getID()) as $amicizia) {
		$uid = $amicizia->getUtenteFrom() === $logged_user->getID()
			? $amicizia->getUtenteTo()
			: $amicizia->getUtenteFrom();
		if (!AmiciziaManager::existsSuggestion($logged_user->getID(), $uid, $film_id))
			$amici[] = AccountManager::doRetrieveByID($uid);
	}

	if (empty($amici))
		die("Hai già suggerito questo film a tutti i tuoi amici");

	$_REQUEST["film_id"] = $film_id;
	$_REQUEST["amici"] = $amici;
	unset($_GET["film_id"]);
	unset($film_id);
	unset($logged_user);
	unset($amici);

	include "../../views/amicizie/Form di selezione amici da suggerire.php";

}