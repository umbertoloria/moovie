<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$utente = AccountManager::doRetrieveByID($id)) {
	print("utente non trovato");
} else {
	unset($id);
	$_REQUEST["utente"] = $utente;
	unset($utente);
	include "views/Pagina utente.php";
}