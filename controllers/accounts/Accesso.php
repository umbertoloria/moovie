<?php

include "../../php/core.php";

$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../../forms/accesso.json", [
	"email" => $email,
	"password" => $password
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
else {

	$utente = AccountManager::authenticate($email, $password);
	if ($utente) {
		Auth::setLoggedUser($utente);
		header("Location: /");
	} else {
		echo "I dati non corrispondono";
	}

}