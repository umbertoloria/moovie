<?php

include "../../php/core.php";

$id = trim(@$_POST["id"]);
$selected_lists = trim(@$_POST["selected_lists"]);
$logged_user = Auth::getLoggedUser();
if (!$logged_user)
echo "Il client non ti ha bloccato?";
elseif (!ctype_digit($id))
	echo "Il client non ti ha bloccato?";
elseif ($selected_lists !== "" and !preg_match("/^(\d+;)*\d+$/", $selected_lists))
	echo "Il client non ti ha bloccato?";
else {

	if ($selected_lists !== "")
		$list_ids = explode(";", $selected_lists);
	else
		$list_ids = [];

	if (ListaManager::insert_film_only($logged_user->getID(), $id, $list_ids))
		header("Location: /film.php?id=" . $id);
	else
		echo "Errore interno";

}