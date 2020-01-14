<?php
include "../../php/core.php";
allowOnlyGestore();
$genere_id = @$_GET["genere_id"];
$ff = new FormFeedbacker();
$genere_dao = GenereDAOFactory::getGenereDAO();
if ($genere_dao->delete($genere_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();