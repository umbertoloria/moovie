<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
if (!$logged_user)
	echo "Il client non ti ha bloccato?";
else {
	$_REQUEST["id"] = $_GET['id'];
	unset($_GET['film_id']);
	include "../../views/Form di aggiunta giudizio.php";
}