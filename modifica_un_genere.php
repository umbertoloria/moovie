<?php
include "parts/initial_page.php";
allowOnlyGestore();
$genere_dao = GenereDAOFactory::getGenereDAO();
$genere = $genere_dao->findByID(@$_GET["id"]);
unset($genere_dao);
$_REQUEST["genere"] = $genere;
include "views/gestione/Form di modifica genere.php";