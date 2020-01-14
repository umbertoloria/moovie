<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$from_user_id = trim(@$_GET["from_user_id"]);
$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($from_user_id))
	echo "Il client non ti ha bloccato?";
elseif (!$amicizia_dao->existsRequestFromTo($from_user_id, $logged_user->getID()))
	echo "La richiesta non esiste";
elseif ($amicizia_dao->refuseFriendshipRequestFromTo($from_user_id, $logged_user->getID()))
	echo "ok";
else
	echo "Errore interno";