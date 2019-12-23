<?php

include "../../php/core.php";

$nome = trim(@$_POST["nome"]);
$nascita = trim(@$_POST["nascita"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_artista.json", [
	"nome" => $nome,
	"nascita" => $nascita,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
else {

	$faccia = @$_FILES["faccia"];
	if ($faccia["error"] !== UPLOAD_ERR_OK) {
		if ($faccia["error"] === UPLOAD_ERR_INI_SIZE)
			echo "Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize");
		elseif ($faccia["error"] === UPLOAD_ERR_NO_FILE)
			echo "Nessun file è stato caricato";
		else
			echo "Errore di caricamento (codice " . $faccia["error"] . ")";
	} elseif (!in_array($faccia["type"], ["image/jpeg", "image/png"])) {
		echo "La copertina deve essere JPG o PNG";
	} else {

		$tmp_artista = new Artista(0, $nome, $nascita, $descrizione);
		$faccia_bin = file_get_contents($faccia["tmp_name"]);

		$saved_artista = ArtistaManager::create($tmp_artista, $faccia_bin);
		if ($saved_artista) {
			header("Location: /artista.php?id=" . $saved_artista->getID());
		} else {
			echo "Errore interno";
		}

	}

}