<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];
$ff = new FormFeedbacker();
$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
if (!$logged_user)
	$ff->block();
elseif (!$promemoria = $promemoria_dao->get_from_utente_and_film($logged_user->getID(), $film_id))
	$ff->block();
elseif ($promemoria_dao->delete($promemoria))
	header("Location: /promemoria.php");
else
	$ff->bug();
$ff->process();