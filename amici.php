<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /404.php");
	die();
}

$utenti = [];
$amicizie_strette = AmiciziaManager::getFriendships($logged_user->getID());
foreach ($amicizie_strette as $amicizia) {
	$uid = $amicizia->getUtenteFrom() === $logged_user->getID()
		? $amicizia->getUtenteTo()
		: $amicizia->getUtenteFrom();
	if (!isset($utenti[$uid]))
		$utenti[$uid] = AccountManager::get_from_id($uid);
}
$_REQUEST["amicizie_strette"] = $amicizie_strette;
unset($amicizie_strette);

$amicizie_richieste = AmiciziaManager::getRequests($logged_user->getID());
foreach ($amicizie_richieste as $amicizia) {
	$uid = $amicizia->getUtenteFrom() === $logged_user->getID()
		? $amicizia->getUtenteTo()
		: $amicizia->getUtenteFrom();
	if (!isset($utenti[$uid]))
		$utenti[$uid] = AccountManager::get_from_id($uid);
}
$_REQUEST["amicizie_richieste"] = $amicizie_richieste;
unset($amicizie_richieste);

$_REQUEST["utente_viewer"] = $logged_user->getID();
$_REQUEST["utenti"] = $utenti;
unset($logged_user);
unset($utenti);
include "views/amicizia/Pagina amici.php";