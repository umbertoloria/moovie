<?php

include "../../php/core.php";

$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../../forms/accesso.json", [
	"email" => $email,
	"password" => $password
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
else {

	$utente = AccountManager::authenticate($email, $password);
	if ($utente) {
		Auth::setLoggedUser($utente);
		header("Location: /");
	} else
		$ff->message("I dati non corrispondono");

}

$ff->process();