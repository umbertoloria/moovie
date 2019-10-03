<?php
$c = explode("/", @$_GET["route"]);

$pagine = array(
	"" => "index.php",
	"chisiamo" => "chisiamo.php"
);

if (isset($pagine[$c[0]])) {
	include $pagine[$c[0]];
} else {
	include '404.php';
}
