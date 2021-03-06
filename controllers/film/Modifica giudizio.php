<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_POST["film_id"];
$voto = @$_POST["voto"];

$valid = Validator\validate("../../forms/aggiunta_e_modifica_giudizio.json", [
	"voto" => $voto
]);

$ff = new FormFeedbacker();

if (!$logged_user or !$valid)
	$ff->block();
else {

	$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
	$tmp_giudizio = $giudizio_dao->findByUtenteAndFilm($logged_user->getID(), $film_id);
	if (is_null($tmp_giudizio))
		$ff->block();
	elseif ($tmp_giudizio->getVoto() == $voto) {
		Testing::redirect("/giudizi.php");
		return;
	} else {
		$tmp_giudizio->setVoto($voto);
		if ($giudizio_dao->update($tmp_giudizio)) {
			Testing::redirect("/giudizi.php");
			return;
		} else
			$ff->bug();
	}

}

$ff->process();