<?php

include "../php/core.php";

$nome = trim(@$_POST["nome"]);
$cognome = trim(@$_POST["nome"]);
$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../forms/registrazione.json", [
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
	$utente = AccountManager::create($nome, $cognome, $email, $password);
	if ($utente) {
		echo "ok. ora creo la lettera.";
	} else {
		echo "ops";
	}
}
