<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user->isGestore());
include "views/gestione/___form_di_aggiunta_film.php";