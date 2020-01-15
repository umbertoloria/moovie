<?php

include_once "../../php/core.php";

$email = trim(@$_POST["email"]);
$password = trim(@$_POST["password"]);

$valid = Validator\validate("../../forms/accesso.json", [
	"email" => $email,
	"password" => $password
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->block();
else {
	$account_dao = AccountDAOFactory::getAccountDAO();
	$utente = $account_dao->authenticate($email, sha1($password));
	if ($utente) {
		Auth::setLoggedUser($utente);
		Testing::redirect("/");
		return;
	} else
		$ff->message("I dati non corrispondono");
}

$ff->process();