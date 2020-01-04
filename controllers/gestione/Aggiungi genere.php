<?php

include "../../php/core.php";

$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (GenereManager::exists($nome))
	$ff->message("Questo nome è associato ad un genere esistente");
else {

	$tmp_genere = new Genere(0, $nome);
	$saved_genere = GenereManager::create($tmp_genere);
	if ($saved_genere)
		header("Location: /genere.php?id=" . $saved_genere->getID());
	else
		$ff->bug();

}

$ff->process();