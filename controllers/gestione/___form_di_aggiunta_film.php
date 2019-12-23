<?php

include "../../php/core.php";

$titolo = trim(@$_POST["titolo"]);
$durata = trim(@$_POST["durata"]);
$anno = trim(@$_POST["anno"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_film.json", [
	"titolo" => $titolo,
	"durata" => $durata,
	"anno" => $anno,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
else {

	$copertina = @$_FILES["copertina"];
	if ($copertina["error"] !== UPLOAD_ERR_OK) {
		if ($copertina["error"] === UPLOAD_ERR_INI_SIZE)
			echo "Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize");
		elseif ($copertina["error"] === UPLOAD_ERR_NO_FILE)
			echo "Nessun file è stato caricato";
		else
			echo "Errore di caricamento (codice " . $copertina["error"] . ")";
	} elseif (!in_array($copertina["type"], ["image/jpeg", "image/png"])) {
		echo "La copertina deve essere JPG o PNG";
	} else {

		$min_sec = explode(":", $durata);
		$durata = $min_sec[0] * 60 + $min_sec[1];

		$tmp_film = new Film(0, $titolo, $durata, $anno, $descrizione);
		$copertina_bin = file_get_contents($copertina["tmp_name"]);

		$saved_film = FilmManager::create($tmp_film, $copertina_bin);
		if ($saved_film) {
			header("Location: /film.php?id=" . $saved_film->getID());
		} else {
			echo "Errore interno";
		}

	}

}