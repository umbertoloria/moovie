<?php

include "../../php/core.php";

allowOnlyGestore();

$nome = trim(@$_POST["nome"]);
$nascita = trim(@$_POST["nascita"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_artista.json", [
	"nome" => $nome,
	"nascita" => $nascita,
	"descrizione" => $descrizione
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
else {

	$faccia = @$_FILES["faccia"];
	if ($faccia["error"] !== UPLOAD_ERR_OK) {
		if ($faccia["error"] === UPLOAD_ERR_INI_SIZE)
			$ff->message(
				"Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize")
			);
		elseif ($faccia["error"] === UPLOAD_ERR_NO_FILE)
			$ff->message("Nessun file è stato caricato");
		else
			$ff->message(
				"Errore di caricamento (codice " . $faccia["error"] . ")"
			);
	} elseif (!in_array($faccia["type"], ["image/jpeg", "image/png"])) {
		$ff->message("La copertina deve essere JPG o PNG");
	} else {

		$tmp_artista = new Artista(0, $nome, $nascita, $descrizione);
		$faccia_bin = file_get_contents($faccia["tmp_name"]);

		$saved_artista = ArtistaManager::create($tmp_artista, $faccia_bin);
		if ($saved_artista)
			header("Location: /artista.php?id=" . $saved_artista->getID());
		else
			$ff->bug();

	}

}

$ff->process();