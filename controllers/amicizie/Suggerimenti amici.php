<?php

include "../../php/core.php";

$film_id = trim(@$_POST["film_id"]);
$selected_friends = trim(@$_POST["selected_friends"]);
$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($film_id))
	echo "Il client non ti ha bloccato?";
elseif ($selected_friends !== "" and !preg_match("/^(\d+;)*\d+$/", $selected_friends))
	echo "Il client non ti ha bloccato?";
else {

	if ($selected_friends !== "")
		$friend_ids = explode(";", $selected_friends);
	else
		$friend_ids = [];

	// TODO: Non far comparire un utente con cui c'è già un suggerimento aperto
	if (AmiciziaManager::suggest($logged_user->getID(), $film_id, $friend_ids))
		header("Location: /conferma_amici_suggeriti.php");
	else
		echo "Errore interno";

}