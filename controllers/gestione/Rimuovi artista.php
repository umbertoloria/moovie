<?php
include_once "../../php/core.php";
allowOnlyGestore();
$artista_id = @$_GET["artista_id"];
$ff = new FormFeedbacker();
$artista_dao = ArtistaDAOFactory::getArtistaDAO();
if ($artista_dao->delete($artista_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();