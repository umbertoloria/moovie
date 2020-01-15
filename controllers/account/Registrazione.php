<?php

include_once "../../php/core.php";

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

$ff = new FormFeedbacker();
$account_dao = AccountDAOFactory::getAccountDAO();

if (!$valid)
	$ff->block();
elseif ($account_dao->exists($email))
	$ff->message("Già esiste");
else {
	$tmp_utente = new Utente(0, $nome, $cognome, $email, sha1($password));
	if ($account_dao->create($tmp_utente))
		header("Location: /conferma_registrazione.php");
	else
		$ff->bug();
}

$ff->process();