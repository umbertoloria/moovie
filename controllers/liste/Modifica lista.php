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

if (!$valid or !ctype_digit($id))
	echo "Il client non ti ha bloccato?";
else {

	$lista = ListaManager::doRetrieveByID($id);
	if (!$lista)
		echo "Il client non ti ha bloccato?";
	elseif ($nome == $lista->getNome() && $visibilità === $lista->getVisibilità())
		header("Location: /lista.php?id=" . $lista->getID());
	else {
		$lista->setNome($nome);
		$lista->setVisibilità($visibilità);
		if (ListaManager::update($lista))
			header("Location: /lista.php?id=" . $lista->getID());
		else
			echo "Errore interno";
	}

}