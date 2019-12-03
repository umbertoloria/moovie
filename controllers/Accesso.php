<?php

include "../php/core.php";

$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../forms/accesso.json", [
	"email" => $email,
	"password" => $password
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!$utente = AccountManager::authenticate($email, $password))
	echo "I dati non corrispondono";
else {
	setcookie("userid", $utente->getID(), time() + 60*60*3, "/");
	header("Location: /");
}