<?php

include "../../php/core.php";

$nome = trim(@$_POST["nome"]);
$cognome = trim(@$_POST["cognome"]);
$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../../forms/registrazione.json", [
	"nome" => $nome,
	"cognome" => $cognome,
	"email" => $email,
	"password" => $password
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (AccountManager::exists($email))
	echo "Già esiste";
else {
	$tmp_utente = new Utente(
		0,
		$nome,
		$cognome,
		$email,
		sha1($password)
	);
	if (AccountManager::create($tmp_utente))
		header("Location: /conferma_registrazione.php");
	else
		echo "Errore interno";
}