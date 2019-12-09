<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$id = @$_GET["id"];
if (!$logged_user)
	echo "Accedi per usare questa funzionalità";
elseif (!ctype_digit($id))
	echo "Il client non ti ha bloccato?";
else {

	$lista = ListaManager::doRetrieveByID($_GET["id"]);
	if (!$lista)
		die("Errore interno");

	$_REQUEST["lista"] = $lista;
	unset($lista);

	include "../../views/liste/Form di modifica lista.php";

}