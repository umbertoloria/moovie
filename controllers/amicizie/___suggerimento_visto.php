<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$user_id = trim(@$_GET["user_id"]);
$film_id = trim(@$_GET["film_id"]);

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($user_id))
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($film_id))
	echo "Il client non ti ha bloccato?";
elseif (AmiciziaManager::dropSuggestion($user_id, $logged_user->getID(), $film_id))
	echo "ok";
else
	echo "Errore interno";