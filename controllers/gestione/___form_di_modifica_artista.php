<?php

include "../../php/core.php";

$id = trim(@$_POST["id"]);
$nome = trim(@$_POST["nome"]);
$nascita = trim(@$_POST["nascita"]);
$descrizione = trim(@$_POST["descrizione"]);

$valid = Validator\validate("../../forms/modifica_artista_film.json", [
	"nome" => $nome,
	"nascita" => $nascita,
	"descrizione" => $descrizione
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
if (!$artista = ArtistaManager::get_from_id($id))
	echo "Il client non ti ha bloccato?";
else {

	$artista->setNome($nome);
	$artista->setNascita($nascita);
	$artista->setDescrizione($descrizione);

	$saved_artista = ArtistaManager::update($artista);
	if ($saved_artista)
		header("Location: /artista.php?id=" . $saved_artista->getID());
	else
		echo "Errore interno";

}