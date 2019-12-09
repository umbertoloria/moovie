<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$id = trim(@$_POST["list_id"]);
$nome = trim(@$_POST["nome"]);
$visibilità = trim(@$_POST["visibilità"]);

$valid = Validator\validate("../../forms/creazione_e_modifica_lista.json", [
	"nome" => $nome,
	"visibilità" => $visibilità
]);

if (!ctype_digit($id) or !$valid)
	echo "Il client non ti ha bloccato?";
elseif (!$lista = ListaManager::doRetrieveByID($id))
	echo "Il client non ti ha bloccato?";
else {
	if ($nome == $lista->getNome() && $visibilità === $lista->getVisibilità())
		header("Location: /lista.php?id=" . $lista->getID());
	elseif ($new_lista = ListaManager::modify($lista->getID(), $nome, $visibilità))
		header("Location: /lista.php?id=" . $new_lista->getID());
	else
		echo "Errore interno";
}