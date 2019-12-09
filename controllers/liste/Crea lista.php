<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$nome = trim(@$_POST["nome"]);
$visibilità = trim(@$_POST["visibilità"]);

$valid = Validator\validate("../../forms/creazione_e_modifica_lista.json", [
	"nome" => $nome,
	"visibilità" => $visibilità
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (ListaManager::exists($logged_user->getID(), $nome))
	echo "Hai già una lista con questo nome";
else {

	$tmp_lista = new Lista(
		0,
		$logged_user->getID(),
		$nome,
		$visibilità
	);

	if ($lista = ListaManager::create($tmp_lista))
		header("Location: /lista.php?id=" . $lista->getID());
	else
		echo "Errore interno";

}