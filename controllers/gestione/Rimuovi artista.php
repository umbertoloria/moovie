<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$artista_id = @$_GET["artista_id"];
$ff = new FormFeedbacker();
if (!$logged_user or !$logged_user->isGestore())
	$ff->message("Il client non ti ha bloccato?");
elseif (ArtistaManager::delete($artista_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();