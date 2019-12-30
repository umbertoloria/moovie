<?php
// Visualizza promemoria
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
assert($logged_user);

$films = [];
$promemorias = PromemoriaManager::get_from_utente($logged_user->getID());
foreach ($promemorias as $promemoria)
	if (!isset($films[$promemoria->getFilm()]))
		$films[$promemoria->getFilm()] = FilmManager::get_from_id($promemoria->getFilm());
$_REQUEST["films"] = $films;
$_REQUEST["promemorias"] = $promemorias;
unset($logged_user);
unset($promemorias);
unset($films);

include "views/Pagina promemoria.php";