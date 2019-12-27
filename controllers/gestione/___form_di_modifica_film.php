<?php

include "../../php/core.php";

$film_id = trim(@$_POST["film_id"]);
$titolo = trim(@$_POST["titolo"]);
$durata = trim(@$_POST["durata"]);
$anno = trim(@$_POST["anno"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_film.json", [
	"titolo" => $titolo,
	"durata" => $durata,
	"anno" => $anno,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!$film = FilmManager::get_from_id($film_id))
	echo "Il client non ti ha bloccato?";
else {

	$copertina = @$_FILES["copertina"];
	if ($copertina["error"] !== UPLOAD_ERR_NO_FILE) {
		if ($copertina["error"] !== UPLOAD_ERR_OK) {
			if ($copertina["error"] === UPLOAD_ERR_INI_SIZE)
				die("Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize"));
			else
				die("Errore di caricamento (codice " . $copertina["error"] . ")");
		} elseif (!in_array($copertina["type"], ["image/jpeg", "image/png"])) {
			die("La copertina deve essere JPG o PNG");
		}
	}

	$min_sec = explode(":", $durata);
	$durata = $min_sec[0] * 60 + $min_sec[1];

	$film->setTitolo($titolo);
	$film->setDurata($durata);
	$film->setAnno($anno);
	$film->setDescrizione($descrizione);

	$saved_film = FilmManager::update($film);

	$copertina_ok = true;
	if ($copertina["error"] !== UPLOAD_ERR_NO_FILE)
		$copertina_ok = FilmManager::uploadCopertina($film->getID(), file_get_contents($copertina["tmp_name"]));

	if ($saved_film and $copertina_ok)
		header("Location: /film.php?id=" . $saved_film->getID());
	else
		echo "Errore interno";

}