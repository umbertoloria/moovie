<?php

include "../../php/core.php";

if (!Auth::getLoggedUser())
	echo "Il client non ti ha bloccato?";
else {
	$_REQUEST["film_id"] = $_GET['film_id'];
	unset($_GET['film_id']);
	include "../../views/film/Form di aggiunta giudizio.php";
}