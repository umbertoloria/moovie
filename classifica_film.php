<?php
include "parts/initial_page.php";
$_REQUEST["films_voti"] = FilmManager::getClassifica();
include "views/film/Classifica film.php";