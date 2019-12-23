<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$film_id = @$_GET["film_id"];
if (!$logged_user or !$logged_user->isGestore())
	echo "Il client non ti ha bloccato?";
elseif (FilmManager::delete($film_id))
	header("Location: /");
else
	echo "Errore interno";