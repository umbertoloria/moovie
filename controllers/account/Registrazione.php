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
	if ($saved_utente = $account_dao->create($tmp_utente)) {
		Testing::setFeedback($saved_utente->getID());
		Testing::redirect("/conferma_registrazione.php");
		return;
	} else
		$ff->bug();
}

$ff->process();