<?php

include "../../php/core.php";

$id = @$_GET["id"];
$logged_user = Auth::getLoggedUser();
if (!ctype_digit($id))
	echo "Errore interno";
elseif (!$logged_user)
	echo "Accedi per usare questa funzionalità";
else {

	$liste = ListaManager::getAllOf($logged_user->getID());
	$liste_contenenti = [];
	foreach ($liste as $lista)
		if (ListaManager::contains($lista->getID(), $id))
			$liste_contenenti[] = $lista->getID();

	$_REQUEST["id"] = $id;
	$_REQUEST["liste"] = $liste;
	$_REQUEST["liste_contenenti"] = $liste_contenenti;
	unset($_GET["id"]);
	unset($id);
	unset($logged_user);
	unset($liste);
	unset($liste_contenenti);

	include "../../views/liste/Form di aggiornamento presenza film in liste.php";

}