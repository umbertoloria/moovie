<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$genere_id = @$_GET["genere_id"];
if (!$logged_user or !$logged_user->isGestore())
	echo "Il client non ti ha bloccato?";
elseif (GenereManager::delete($genere_id))
	header("Location: /");
else
	echo "Errore interno";