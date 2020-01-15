<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$to_user_id = trim(@$_GET["to_user_id"]);
$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();

if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($to_user_id))
	echo "Il client non ti ha bloccato?";
elseif ($amicizia_dao->existsSomethingBetween($logged_user->getID(), $to_user_id))
	echo "Siete già legati";
elseif ($amicizia_dao->requestFriendshipFromTo($logged_user->getID(), $to_user_id))
	echo "ok";
else
	echo "Impossibile inviare la richiesta";