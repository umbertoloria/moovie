<?php
include_once "../../php/core.php";
$utente = Auth::getLoggedUser();
if (is_null($utente) or !$utente->isGestore()) {
	Testing::redirect("/");
	return;
}
$genere_id = @$_GET["genere_id"];
$ff = new FormFeedbacker();
$genere_dao = GenereDAOFactory::getGenereDAO();
if (!ctype_digit($genere_id))
	$ff->block();
elseif ($genere_dao->delete($genere_id)) {
	Testing::setFeedback("ok");
	Testing::redirect("/");
	return;
} else
	$ff->bug();
$ff->process();