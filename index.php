<?php
// Visualizza pagina iniziale
include "parts/initial_page.php";

$logged_user = Auth::getLoggedUser();
if ($logged_user) {

	$friends = [$logged_user->getID()];
	$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();
	foreach ($amicizia_dao->getFriendships($logged_user->getID()) as $amicizia) {
		$friends[] = $amicizia->getUtenteFrom() === $logged_user->getID() ?
			$amicizia->getUtenteTo() :
			$amicizia->getUtenteFrom();
	}
	unset($amicizia_dao);
	unset($logged_user);
	$giudizio_dao = GiudizioDAOFactory::getGiudizioDAO();
	$giudizi = $giudizio_dao->findByUtenti($friends);
	unset($giudizio_dao);
	$utenti = [];
	$films = [];
	$account_dao = AccountDAOFactory::getAccountDAO();
	$film_dao = FilmDAOFactory::getFilmDAO();
	foreach ($giudizi as $giudizio) {
		if (!isset($utenti[$giudizio->getUtente()]))
			$utenti[$giudizio->getUtente()] = $account_dao->findByID($giudizio->getUtente());
		if (!isset($films[$giudizio->getFilm()]))
			$films[$giudizio->getFilm()] = $film_dao->findByID($giudizio->getFilm());
	}
	unset($film_dao);
	unset($account_dao);
	$_REQUEST["giudizi"] = $giudizi;
	$_REQUEST["utenti"] = $utenti;
	$_REQUEST["films"] = $films;
	unset($giudizi);
	unset($utenti);
	unset($films);
	include "views/film/Timeline giudizi.php";

} else {
	unset($logged_user);
	include "views/account/Pagina iniziale per ospiti.php";
}