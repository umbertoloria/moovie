<?php

include "../../php/core.php";

$genere_id = trim(@$_POST["genere_id"]);
$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (!$genere = GenereManager::get_from_id($genere_id))
	$ff->message("Il client non ti ha bloccato?");
elseif (GenereManager::exists($nome))
	$ff->message("Questo nome è associato ad un genere esistente");
else {

	$genere->setNome($nome);

	$saved_genere = GenereManager::update($genere);
	if ($saved_genere)
		header("Location: /genere.php?id=" . $saved_genere->getID());
	else
		$ff->bug();

}

$ff->process();