<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];
$ff = new FormFeedbacker();
$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
if (!$logged_user)
	$ff->message("Il client non ti ha bloccato?");
elseif (!ctype_digit($film_id))
	$ff->message("Il client non ti ha bloccato?");
elseif (!$promemoria = $promemoria_dao->get_from_utente_and_film($logged_user->getID(), $film_id))
	$ff->message("Il client non ti ha bloccato?");
elseif ($promemoria_dao->delete($promemoria))
	header("Location: /promemoria.php");
else
	$ff->bug();
$ff->process();