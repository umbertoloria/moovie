<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$with_user_id = trim(@$_GET["with_user_id"]);
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($with_user_id))
	echo "Il client non ti ha bloccato?";
elseif (!AmiciziaManager::existsFriendshipBetween($logged_user->getID(), $with_user_id))
	echo "L'amicizia non esiste";
elseif (AmiciziaManager::removeFriendshipBetween($logged_user->getID(), $with_user_id))
	echo "ok";
else
	echo "Errore interno";