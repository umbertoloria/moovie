<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$artista_id = @$_GET["artista_id"];
if (!$logged_user or !$logged_user->isGestore())
	echo "Il client non ti ha bloccato?";
elseif (ArtistaManager::delete($artista_id))
	header("Location: /");
else
	echo "Errore interno";