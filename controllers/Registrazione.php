<?php

include "../php/core.php";

$nome = trim(@$_POST["nome"]);
$cognome = trim(@$_POST["nome"]);
$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);
$advisor = trim(@$_POST["advisor"]);

if (AccountManager::exists($email))
	echo "Già esiste";
else {
	$utente = AccountManager::create($nome, $cognome, $email, $password, $advisor);
	if ($utente) {
		echo "ok. ora creo la lettera.";
	} else {
		echo "ops";
	}
}
