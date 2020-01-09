<?php
include "parts/initial_page.php";
allowOnlyGestore();
$genere = GenereManager::get_from_id(@$_GET["id"]);
$_REQUEST["genere"] = $genere;
include "views/gestione/Form di modifica genere.php";