<?php

include "../../php/core.php";

$logged_user = Auth::getLoggedUser();
assert($logged_user);

$film_id = $_GET["film_id"];
$_REQUEST["film_id"] = $film_id;
$film_guardato = FilmGuardatiManager::doRetrieveByUtenteAndFilm($logged_user->getID(), $film_id);
assert($film_guardato);
$_REQUEST["selected"] = $film_guardato->getVoto();

unset($logged_user);
unset($_GET['film_id']);
unset($film_id);
unset($film_guardato);

include "../../views/Form di modifica giudizio.php";