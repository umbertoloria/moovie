<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$list_id = @$_GET["list_id"];

if (!ctype_digit($list_id))
	echo "dammi un numero per id";
elseif (!ListaManager::is_owner($logged_user->getID(), $list_id))
	echo "devi esserne in proprietario";
elseif (ListaManager::delete($list_id))
	header("Location: /conferma_lista_eliminata.php");
else
	echo "Errore interno";