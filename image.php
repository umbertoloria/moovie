<?php

include "php/core.php";

$kind = @$_GET["kind"];
$id = @$_GET["id"];

header("Content-Type: image/jpeg");
if ($kind === "artist")
	echo ArtistaManager::downloadFaccia($id);
else if ($kind === "movie")
	echo FilmManager::downloadCopertina($id);
