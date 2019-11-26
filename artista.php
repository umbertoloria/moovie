<?php

include "parts/initial_page.php";

$id = @$_GET["id"];
if ($id === null) {
	print("non mi hai dato un id");
} elseif (!ctype_digit($id)) {
	print("dammi un numero per id");
} elseif (!$artista = ArtistaManager::doRetrieveByID($id)) {
	print("artista non trovato");
} else {
	$_REQUEST["artista"] = $artista;
	include "views/Pagina artista.php";
}
