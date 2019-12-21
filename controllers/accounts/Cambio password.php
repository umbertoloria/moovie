<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$cur_pwd = trim(@$_POST["cur_pwd"]);
$new_pwd = trim(@$_POST["new_pwd"]);

$valid = Validator\validate("../../forms/cambio_password.json", [
	"cur_pwd" => $cur_pwd,
	"new_pwd" => $new_pwd
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
elseif (!AccountManager::is_user_password($logged_user->getID(), $cur_pwd))
	echo "La password attuale fornita non corrisponde";
elseif (AccountManager::set_user_password($logged_user->getID(), $new_pwd))
	header("Location: /conferma_cambio_password.php");
else
	echo "Errore interno";