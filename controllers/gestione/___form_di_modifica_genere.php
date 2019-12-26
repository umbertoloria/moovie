<?php

include "../../php/core.php";

$genere_id = trim(@$_POST["genere_id"]);
$nome = trim(@$_POST["nome"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_genere.json", [
	"nome" => $nome
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!$genere = GenereManager::doRetrieveByID($genere_id))
	echo "Il client non ti ha bloccato?";
elseif (GenereManager::exists($nome))
	echo "Questo nome è associato ad un genere esistente";
else {

	$genere->setNome($nome);

	$saved_genere = GenereManager::update($genere);
	if ($saved_genere)
		header("Location: /genere.php?id=" . $saved_genere->getID());
	else
		echo "Errore interno";

}