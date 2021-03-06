<?php

namespace Formats;

function durata($minuti) {
	if ($minuti > 60)
		return (int)($minuti / 60) . "h " . ($minuti % 60) . "m";
	else
		return $minuti . "m";
}

function data($data) {
	$mesi = array(
		"gennaio", "febbraio", "marzo", "aprile",
		"maggio", "giugno", "luglio", "agosto",
		"settembre", "ottobre", "novembre", "dicembre"
	);
	$comps = explode("-", $data);
	return (int)($comps[2]) . " " . $mesi[$comps[1] - 1] . " " . $comps[0];
}

function startswith($needle, $haystack) {
	return substr($haystack, 0, strlen($needle)) === $needle;
}

function endswith($needle, $haystack) {
	$length = strlen($needle);
	if ($length == 0)
		return true;
	else
		return substr($haystack, -$length) === $needle;
}