<?php

include "../../php/core.php";

if (!isset($_GET["lista_id"]))
	die("Errore interno");

$logged_user = Auth::getLoggedUser();
if ($logged_user === null)
	die("Accedi per usare questa funzionalità");

$lista = ListaManager::doRetrieveByID($_GET["lista_id"]);
if (!$lista)
	die("Errore interno");

$_REQUEST["id"] = $lista->getID();
$_REQUEST["nome"] = $lista->getNome();
$_REQUEST["visibilità"] = $lista->getVisibilità();

unset($_GET["lista_id"]);
unset($logged_user);
unset($lista);

include "../../views/Form di modifica lista.php";