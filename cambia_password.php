<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user);
include "views/account/Form di cambio password.php";