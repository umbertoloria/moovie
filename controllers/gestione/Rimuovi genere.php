<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$genere_id = @$_GET["genere_id"];
$ff = new FormFeedbacker();
if (!$logged_user or !$logged_user->isGestore())
	$ff->message("Il client non ti ha bloccato?");
elseif (GenereManager::delete($genere_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();