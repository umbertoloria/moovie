<?php

include "../../php/core.php";

allowOnlyGestore();

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

$ff = new FormFeedbacker();

$film_dao = FilmDAOFactory::getFilmDAO();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (!$film = $film_dao->get_from_id($film_id))
	$ff->message("Il client non ti ha bloccato?");
else {

	$copertina = @$_FILES["copertina"];
	$copertina_vuota = true;
	$copertina_valida = false;
	if ($copertina["error"] !== UPLOAD_ERR_NO_FILE) {
		// L'utente ha provato a caricare un'immagine
		$copertina_vuota = false;
		$copertina_valida = true;
		if ($copertina["error"] !== UPLOAD_ERR_OK) {
			// Si è verificato un errore di caricamento
			if ($copertina["error"] === UPLOAD_ERR_INI_SIZE)
				$ff->message(
					"Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize")
				);
			else
				$ff->message(
					"Errore di caricamento (codice " . $copertina["error"] . ")"
				);
			$copertina_valida = false;
		} elseif (!in_array($copertina["type"], ["image/jpeg", "image/png"])) {
			$ff->message("La copertina deve essere JPG o PNG");
			$copertina_valida = false;
		}
	}

	if ($copertina_vuota or $copertina_valida) {

		$film->setTitolo($titolo);
		$film->setDurata($durata);
		$film->setAnno($anno);
		$film->setDescrizione($descrizione);

		$saved_film = $film_dao->update($film);

		$copertina_ok = true;
		if ($copertina_valida) {
			$copertina_bin = file_get_contents($copertina["tmp_name"]);
			$copertina_ok = $film_dao->uploadCopertina($film->getID(), $copertina_bin);
		}

		if ($saved_film and $copertina_ok)
			header("Location: /film.php?id=" . $saved_film->getID());
		else
			$ff->bug();

	}

}

$ff->process();