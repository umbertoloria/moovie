<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];

$ff = new FormFeedbacker();

$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();

if (!$logged_user)
	$ff->block();
elseif (!$giudizio = $giudizio_dao->get_from_utente_and_film($logged_user->getID(), $film_id))
	$ff->block();
elseif ($giudizio_dao->delete($giudizio))
	header("Location: /giudizi.php");
else
	$ff->bug();

$ff->process();