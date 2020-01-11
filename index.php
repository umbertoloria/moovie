<?php
// Visualizza pagina iniziale
include "parts/initial_page.php";

$logged_user = Auth::getLoggedUser();
if ($logged_user) {

	$friends = [$logged_user->getID()];
	foreach (AmiciziaManager::getFriendships($logged_user->getID()) as $amicizia) {
		$uid = $amicizia->getUtenteFrom() === $logged_user->getID()
			? $amicizia->getUtenteTo()
			: $amicizia->getUtenteFrom();
		$friends[] = $uid;
	}
	unset($logged_user);
	$giudizi = GiudizioManager::getAllOf($friends);
	$utenti = [];
	$films = [];
	$account_dao = AccountDAOFactory::getAccountDAO();
	foreach ($giudizi as $giudizio) {
		if (!isset($utenti[$giudizio->getUtente()]))
			$utenti[$giudizio->getUtente()] = $account_dao->get_from_id($giudizio->getUtente());
		if (!isset($films[$giudizio->getFilm()]))
			$films[$giudizio->getFilm()] = FilmManager::get_from_id($giudizio->getFilm());
	}
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