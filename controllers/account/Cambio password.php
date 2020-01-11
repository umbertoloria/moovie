<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /");
	die();
}

$cur_pwd = trim(@$_POST["cur_pwd"]);
$new_pwd = trim(@$_POST["new_pwd"]);

$valid = Validator\validate("../../forms/cambio_password.json", [
	"cur_pwd" => $cur_pwd,
	"new_pwd" => $new_pwd
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->message("Il client non ti ha bloccato?");
elseif ($logged_user->getPassword() !== sha1($cur_pwd))
	$ff->message("La password attuale fornita non corrisponde");
else {
	$logged_user->setPassword(sha1($new_pwd));
	$account_dao = AccountDAOFactory::getAccountDAO();
	$saved_user = $account_dao->update($logged_user);
	if ($saved_user) {
		unset($logged_user);
		Auth::setLoggedUser($saved_user);
		header("Location: /conferma_cambio_password.php");
	} else
		$ff->bug();
}

$ff->process();