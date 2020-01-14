<?php

include "../../php/core.php";

allowOnlyGestore();

$genere_id = trim(@$_POST["genere_id"]);
$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

$ff = new FormFeedbacker();

$genere_dao = GenereDAOFactory::getGenereDAO();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (!$genere = $genere_dao->get_from_id($genere_id))
	$ff->message("Il client non ti ha bloccato?");
elseif ($genere_dao->exists($nome))
	$ff->message("Questo nome è associato ad un genere esistente");
else {

	$genere->setNome($nome);

	$saved_genere = $genere_dao->update($genere);
	if ($saved_genere)
		header("Location: /genere.php?id=" . $saved_genere->getID());
	else
		$ff->bug();

}

$ff->process();