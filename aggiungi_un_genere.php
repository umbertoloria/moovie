<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
include "views/gestione/Form di aggiunta genere.php";