<?php

include "../../php/core.php";

$artista_id = trim(@$_POST["artista_id"]);
$nome = trim(@$_POST["nome"]);
$nascita = trim(@$_POST["nascita"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/aggiunta_e_modifica_artista.json", [
	"nome" => $nome,
	"nascita" => $nascita,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!$artista = ArtistaManager::get_from_id($artista_id))
	echo "Il client non ti ha bloccato?";
else {

	$faccia = @$_FILES["faccia"];
	if ($faccia["error"] !== UPLOAD_ERR_NO_FILE) {
		if ($faccia["error"] !== UPLOAD_ERR_OK) {
			if ($faccia["error"] === UPLOAD_ERR_INI_SIZE)
				die("Il server rifiuta qualsiasi file più grande di " . ini_get("upload_max_filesize"));
			else
				die("Errore di caricamento (codice " . $faccia["error"] . ")");
		} elseif (!in_array($faccia["type"], ["image/jpeg", "image/png"])) {
			die("L'immagine deve essere JPG o PNG");
		}
	}

	$artista->setNome($nome);
	$artista->setNascita($nascita);
	$artista->setDescrizione($descrizione);

	$saved_artista = ArtistaManager::update($artista);

	$faccia_ok = true;
	if ($faccia["error"] !== UPLOAD_ERR_NO_FILE)
		ArtistaManager::uploadFaccia($artista->getID(), file_get_contents($faccia["tmp_name"]));

	if ($saved_artista and $faccia_ok)
		header("Location: /artista.php?id=" . $saved_artista->getID());
	else
		echo "Errore interno";

}