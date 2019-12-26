<?php
// Visualizza profilo
include "parts/initial_page.php";
$utente = AccountManager::get_from_id(@$_GET["id"]);
if (!$utente) {
	header("Location: /404.php");
	die();
}

$_REQUEST["show_actions"] = [];
$logged_user = Auth::getLoggedUser();
if ($logged_user and $logged_user->getID() !== $utente->getID()) {
	if (AmiciziaManager::existsFriendshipBetween($logged_user->getID(), $utente->getID())) {
		// Esiste una amicizia accettata
		$_REQUEST["show_actions"][] = "remove_friendship";
	} elseif (AmiciziaManager::existsRequestFromTo($utente->getID(), $logged_user->getID())) {
		// Questo utente mi ha mandato una richiesta
		$_REQUEST["show_actions"][] = "accept_friendship";
		$_REQUEST["show_actions"][] = "refuse_friendship";
	} elseif (AmiciziaManager::existsRequestFromTo($logged_user->getID(), $utente->getID())) {
		// Io ho mandato una richiesta a questo utente
		$_REQUEST["show_actions"][] = "remove_friendship_request";
	} else {
		// Non esiste nessuna amicizia né richiesta tra di noi
		$_REQUEST["show_actions"][] = "request_friendship";
	}
}
unset($logged_user);
$_REQUEST["utente"] = $utente;
include "views/Pagina utente.php";
unset($_REQUEST["show_actions"]);
unset($_REQUEST["utente"]);

$giudizi = GiudizioManager::getAllOf([$utente->getID()]);
unset($utente);
$films = [];
foreach ($giudizi as $giudizio)
	if (!isset($films[$giudizio->getFilm()]))
		$films[$giudizio->getFilm()] = FilmManager::get_from_id($giudizio->getFilm());
$_REQUEST["giudizi"] = $giudizi;
$_REQUEST["films"] = $films;
include "views/film/___timeline_giudizi.php";