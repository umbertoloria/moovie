<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
$id = @$_GET["id"];
if (!$logged_user)
	echo "devi essere loggato";
elseif (!ctype_digit($id))
	echo "dammi un numero per id";
elseif (!ListaManager::is_owner($logged_user->getID(), $id))
	echo "devi esserne in proprietario";
elseif (ListaManager::delete($id))
	header("Location: /conferma_lista_eliminata.php");
else
	echo "Errore interno";