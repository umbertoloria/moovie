<?php

include "utente.php";

$c = explode("/", @$_GET["route"]);

$pagine = array(
	"" => "home.php",
	"chisiamo" => "chisiamo.php"
);

if (isset($pagine[$c[0]])) {
	$_REQUEST['utente'] = new Utente("Gianluca", "Pirone");
	include $pagine[$c[0]];
} else {
	include '404.php';
}