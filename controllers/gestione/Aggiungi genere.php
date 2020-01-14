<?php

include "../../php/core.php";

allowOnlyGestore();

$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

$ff = new FormFeedbacker();

$genere_dao = GenereDAOFactory::getGenereDAO();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif ($genere_dao->exists($nome))
	$ff->message("Questo nome è associato ad un genere esistente");
else {

	$tmp_genere = new Genere(0, $nome);
	$saved_genere = $genere_dao->create($tmp_genere);
	if ($saved_genere)
		header("Location: /genere.php?id=" . $saved_genere->getID());
	else
		$ff->bug();

}

$ff->process();