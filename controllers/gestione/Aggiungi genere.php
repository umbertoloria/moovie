<?php

include_once "../../php/core.php";

$utente = Auth::getLoggedUser();
if (is_null($utente) or !$utente->isGestore()) {
	Testing::redirect("/");
	return;
}

$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

$ff = new FormFeedbacker();

$genere_dao = GenereDAOFactory::getGenereDAO();

if (!$valid)
	$ff->block();
elseif ($genere_dao->exists($nome))
	$ff->message("Questo nome è associato ad un genere esistente");
else {
	$tmp_genere = new Genere(0, $nome);
	$saved_genere = $genere_dao->create($tmp_genere);
	if ($saved_genere) {
		Testing::setFeedback($saved_genere->getID());
		Testing::redirect("/genere.php?id=" . $saved_genere->getID());
		return;
	} else
		$ff->bug();
}

$ff->process();