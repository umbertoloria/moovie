<?php
include "../../php/core.php";
allowOnlyGestore();
$artista_id = @$_GET["artista_id"];
$ff = new FormFeedbacker();
if (ArtistaManager::delete($artista_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();