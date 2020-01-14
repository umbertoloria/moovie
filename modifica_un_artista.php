<?php
include "parts/initial_page.php";
allowOnlyGestore();
$artista_dao = ArtistaDAOFactory::getArtistaDAO();
$artista = $artista_dao->get_from_id(@$_GET["id"]);
unset($artista_dao);
$_REQUEST["artista"] = $artista;
include "views/gestione/Form di modifica artista.php";