<?php
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
	foreach ($giudizi as $giudizio) {
		if (!isset($utenti[$giudizio->getUtente()]))
			$utenti[$giudizio->getUtente()] = AccountManager::get_from_id($giudizio->getUtente());
		if (!isset($films[$giudizio->getFilm()]))
			$films[$giudizio->getFilm()] = FilmManager::get_from_id($giudizio->getFilm());
	}
	$_REQUEST["giudizi"] = $giudizi;
	$_REQUEST["utenti"] = $utenti;
	$_REQUEST["films"] = $films;
	include "views/film/Timeline giudizi.php";

} else {
	unset($logged_user);
	?>
	<h1>Benvenuto ospite!</h1>
	<p>Per poter utilizzare le funzioni di Moovie, <a href="/accesso.php">accedi</a> oppure <a href="registrazione.php">registra</a>
		un nuovo account.</p>
	<?php
}