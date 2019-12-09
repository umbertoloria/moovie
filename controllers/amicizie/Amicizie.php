<?php

$kind = @$_GET["kind"];
if (!in_array($kind, ["request", "accept", "refuse"])) {
	die("Opzione non valida!");
}

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
elseif ($kind === "request") {

	$to_user_id = trim(@$_GET["to_user_id"]);
	if (!ctype_digit($to_user_id))
		echo "Impossibile procedere";
	elseif (AmiciziaManager::request($logged_user->getID(), $to_user_id))
		echo "ok";
	else
		echo "Impossibile inviare la richiesta";

} elseif ($kind === "accept") {

} elseif ($kind === "refuse") {

}