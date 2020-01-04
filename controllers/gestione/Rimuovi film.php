<?php
include "../../php/core.php";
allowOnlyGestore();
$film_id = @$_GET["film_id"];
$ff = new FormFeedbacker();
if (FilmManager::delete($film_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();