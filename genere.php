<?php
include "parts/initial_page.php";
$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$genere = GenereManager::doRetrieveByID($id)) {
	print("genere non trovato");
} else {
	unset($id);
	$_REQUEST["genere"] = $genere;
	unset($genere);
	include "views/Pagina genere.php";
}