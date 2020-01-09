<?php
include "../../php/core.php";
allowOnlyGestore();
$genere_id = @$_GET["genere_id"];
$ff = new FormFeedbacker();
if (GenereManager::delete($genere_id))
	header("Location: /");
else
	$ff->bug();
$ff->process();