<?php

include "../../php/core.php";

allowOnlyGestore();

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

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
else {

	$copertina = @$_FILES["copertina"];
	if ($copertina["error"] !== UPLOAD_ERR_OK) {
		if ($copertina["error"] === UPLOAD_ERR_INI_SIZE)
			$ff->message(
				"Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize")
			);
		elseif ($copertina["error"] === UPLOAD_ERR_NO_FILE)
			$ff->message("Nessun file è stato caricato");
		else
			$ff->message(
				"Errore di caricamento (codice " . $copertina["error"] . ")"
			);
	} elseif (!in_array($copertina["type"], ["image/jpeg", "image/png"])) {
		$ff->message("La copertina deve essere JPG o PNG");
	} else {

		$tmp_film = new Film(0, $titolo, $durata, $anno, $descrizione);
		$copertina_bin = file_get_contents($copertina["tmp_name"]);

		$film_dao = FilmDAOFactory::getFilmDAO();
		$saved_film = $film_dao->create($tmp_film, $copertina_bin);
		if ($saved_film)
			header("Location: /film.php?id=" . $saved_film->getID());
		else
			$ff->bug();

	}

}

$ff->process();