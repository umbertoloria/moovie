<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];
$ff = new FormFeedbacker();
if (!$logged_user or !$logged_user->isGestore())
	$ff->message("Il client non ti ha bloccato?");
elseif (FilmManager::delete($film_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();