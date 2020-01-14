<?php

include "../../php/core.php";

allowOnlyGestore();

$artista_id = trim(@$_POST["artista_id"]);
$nome = trim(@$_POST["nome"]);
$nascita = trim(@$_POST["nascita"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_artista.json", [
	"nome" => $nome,
	"nascita" => $nascita,
	"descrizione" => $descrizione
]);

$ff = new FormFeedbacker();

$artista_dao = ArtistaDAOFactory::getArtistaDAO();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif (!$artista = $artista_dao->get_from_id($artista_id))
	$ff->message("Il client non ti ha bloccato?");
else {

	$faccia = @$_FILES["faccia"];
	$faccia_vuota = true;
	$faccia_valida = false;
	if ($faccia["error"] !== UPLOAD_ERR_NO_FILE) {
		// L'utente ha provato a caricare un'immagine
		$faccia_vuota = false;
		$faccia_valida = true;
		if ($faccia["error"] !== UPLOAD_ERR_OK) {
			// Si è verificato un errore di caricamento
			if ($faccia["error"] === UPLOAD_ERR_INI_SIZE)
				$ff->message(
					"Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize")
				);
			else
				$ff->message(
					"Errore di caricamento (codice " . $faccia["error"] . ")"
				);
			$faccia_valida = false;
		} elseif (!in_array($faccia["type"], ["image/jpeg", "image/png"])) {
			$ff->message("L'immagine deve essere JPG o PNG");
			$faccia_valida = false;
		}
	}

	if ($faccia_vuota or $faccia_valida) {

		$artista->setNome($nome);
		$artista->setNascita($nascita);
		$artista->setDescrizione($descrizione);

		$saved_artista = $artista_dao->update($artista);

		$faccia_ok = true;
		if ($faccia_valida) {
			$faccia_bin = file_get_contents($faccia["tmp_name"]);
			$faccia_ok = $artista_dao->uploadFaccia($artista->getID(), $faccia_bin);
		}

		if ($saved_artista and $faccia_ok)
			header("Location: /artista.php?id=" . $saved_artista->getID());
		else
			$ff->bug();

	}

}

$ff->process();