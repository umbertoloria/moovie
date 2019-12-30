<?php
// Suggerimenti automatici
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if (!$logged_user) {
	header("Location: /404.php");
	die();
}
$_REQUEST["films"] = FilmManager::suggest_me($logged_user->getID());
include "views/film/Pagina suggerimenti.php";