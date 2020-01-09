<?php
include "parts/initial_page.php";
if (!Auth::getLoggedUser()) {
	header("Location: /");
	die();
}
include "views/account/Form di cambio password.php";