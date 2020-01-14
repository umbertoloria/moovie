<?php

include "php/core.php";

$kind = @$_GET["kind"];
$id = @$_GET["id"];

header("Content-Type: image/jpeg");
if ($kind === "artist") {
	$artista_dao = ArtistaDAOFactory::getArtistaDAO();
	echo $artista_dao->downloadFaccia($id);
} elseif ($kind === "movie")
	echo FilmManager::downloadCopertina($id);
