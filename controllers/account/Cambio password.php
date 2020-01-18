<?php

include_once "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	Testing::redirect("/");
	return;
}

$cur_pwd = trim(@$_POST["cur_pwd"]);
$new_pwd = trim(@$_POST["new_pwd"]);

$valid = Validator\validate("../../forms/cambio_password.json", [
	"cur_pwd" => $cur_pwd,
	"new_pwd" => $new_pwd
]);

$ff = new FormFeedbacker();

if (!$valid)
	$ff->block();
elseif ($logged_user->getPassword() !== sha1($cur_pwd))
	$ff->message("La password attuale fornita non corrisponde");
else {
	$logged_user->setPassword(sha1($new_pwd));
	$account_dao = AccountDAOFactory::getAccountDAO();
	$saved_user = $account_dao->update($logged_user);
	if ($saved_user) {
		unset($logged_user);
		Auth::setLoggedUser($saved_user);
		Testing::redirect("/conferma_cambio_password.php");
		return;
	} else
		$ff->bug();
}

$ff->process();