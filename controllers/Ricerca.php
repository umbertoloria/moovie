<?php

include "../php/core.php";

$kind = @$_POST["kind"];
$fulltext = @$_POST["fulltext"];

function complete_page() {
	include "../parts/head.php";
	include "../parts/leftmenu.php";
	include "../parts/topmenu.php";
	echo "<p>Non so ancora cosa farti vedere scusami <3 </p>";
}

if ($kind === "movies") {
	complete_page();
} elseif ($kind === "artists") {
	complete_page();
} elseif ($kind === "users") {
	complete_page();
} else {
	header("Location: /404.php");
}