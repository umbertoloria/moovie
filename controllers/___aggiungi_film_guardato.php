<?php

include "../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);
// $_REQUEST["film_id"] = $_GET['film_id'];
unset($_GET['film_id']);
include "../views/Form di aggiunta giudizio.php";
