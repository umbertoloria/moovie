<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$with_user_id = trim(@$_GET["with_user_id"]);
$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($with_user_id))
	echo "Il client non ti ha bloccato?";
elseif (!$amicizia_dao->existsFriendshipBetween($logged_user->getID(), $with_user_id))
	echo "L'amicizia non esiste";
elseif ($amicizia_dao->removeFriendshipBetween($logged_user->getID(), $with_user_id))
	echo "ok";
else
	echo "Errore interno";