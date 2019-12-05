<?php
// FIXME: Dividere questo controller troppo grosso.
include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$kind = trim(@$_POST["kind"]);

if ($kind === "create") {

	$nome = trim(@$_POST["nome"]);
	$visibilità = trim(@$_POST["visibilità"]);

	$valid = Validator\validate("../forms/creazione_lista.json", [
		"nome" => $nome,
		"visibilità" => $visibilità
	]);

	if (!$valid)
		echo "Il client non ti ha bloccato?";
	elseif (ListaManager::exists($logged_user->getID(), $nome))
		echo "Hai già una lista con questo nome";
	else {
		$lista = ListaManager::create($logged_user->getID(), $nome, $visibilità);
		if ($lista)
			header("Location: /lista.php?id=" . $lista->getID());
		else
			echo "ops";
	}

	// TODO: Implementami plz (sono il duale del form in /views/Form di creazione lista.php)

} elseif ($kind === "modify") {
	// TODO: Implementami :-(
} elseif ($kind === "delete") {
	// TODO: Implementami :-(
} elseif ($kind === "absolute_presence") {

	$film_id = trim(@$_POST["film_id"]);
	$selected_lists = trim(@$_POST["selected_lists"]);

	// FIXME: usare questa espressione regolare anche su items-selecter.
	if ($selected_lists !== "" && !preg_match("/^(\d+;)*\d+$/", $selected_lists))
		echo "aej. il cliente dovrebbe fermarti anche qui";
	else {

		if ($selected_lists !== "")
			$list_ids = explode(";", $selected_lists);
		else
			$list_ids = [];
		$status = ListaManager::insert_film_only($logged_user->getID(), $film_id, $list_ids);
		if ($status)
			header("Location: /film.php?id=" . $film_id);
		else
			echo "ops";

	}

} elseif ($kind === "follow") {
	// TODO: Implementami :-(
}