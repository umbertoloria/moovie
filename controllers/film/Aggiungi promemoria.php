<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];

$ff = new FormFeedbacker();

if (!$logged_user)
	$ff->block();
elseif (!ctype_digit($film_id))
	$ff->block();
else {
	$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
	$tmp_promemoria = new Promemoria($logged_user->getID(), $film_id, "");
	if ($promemoria_dao->create($tmp_promemoria))
		header("Location: /film.php?id=" . $film_id);
	else
		$ff->bug();
}

$ff->process();