<?php
// Visualizza promemoria
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /");
	die();
}

$films = [];
$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
$promemorias = $promemoria_dao->get_from_utente($logged_user->getID());
unset($promemoria_dao);
$film_dao = FilmDAOFactory::getFilmDAO();
foreach ($promemorias as $promemoria)
	if (!isset($films[$promemoria->getFilm()]))
		$films[$promemoria->getFilm()] = $film_dao->get_from_id($promemoria->getFilm());
unset($film_dao);
$_REQUEST["films"] = $films;
$_REQUEST["promemorias"] = $promemorias;
unset($logged_user);
unset($promemorias);
unset($films);

include "views/film/Pagina promemoria.php";