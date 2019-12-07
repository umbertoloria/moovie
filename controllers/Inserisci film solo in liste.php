<?php

include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$film_id = trim(@$_POST["film_id"]);
$selected_lists = trim(@$_POST["selected_lists"]);

if ($selected_lists !== "" and !preg_match("/^(\d+;)*\d+$/", $selected_lists))
	echo "Il client non ti ha bloccato?";
else {
	if ($selected_lists !== "")
		$list_ids = explode(";", $selected_lists);
	else
		$list_ids = [];

	if (ListaManager::insert_film_only($logged_user->getID(), $film_id, $list_ids))
		header("Location: /film.php?id=" . $film_id);
	else
		echo "Errore interno";
}