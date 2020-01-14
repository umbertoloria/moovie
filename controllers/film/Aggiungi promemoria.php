<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];

$ff = new FormFeedbacker();

if (!$logged_user)
	$ff->message("Il client non ti ha bloccato?");
elseif (!ctype_digit($film_id))
	$ff->message("Il client non ti ha bloccato?");
else {

	$tmp_promemoria = new Promemoria($logged_user->getID(), $film_id, "");
	if (PromemoriaManager::create($tmp_promemoria))
		header("Location: /film.php?id=" . $film_id);
	else
		$ff->bug();

}

$ff->process();