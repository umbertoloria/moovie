<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user);

$films = [];
$promemorias = PromemoriaManager::get($logged_user->getID());
foreach ($promemorias as $promemoria)
	if (!isset($films[$promemoria->getFilm()]))
		$films[$promemoria->getFilm()] = FilmManager::doRetrieveByID($promemoria->getFilm());
$_REQUEST["films"] = $films;
$_REQUEST["promemorias"] = $promemorias;
unset($logged_user);
unset($promemorias);
unset($films);

include "views/___pagina_promemoria.php";