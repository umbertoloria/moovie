<?php
$generi = $_REQUEST["generi"];
$fhgs = $_REQUEST["fhgs"];
echo "<br/>Generi: ";
foreach ($fhgs as $fhg) {
	$genere = $generi[$fhg];
	assert($genere instanceof Genere);
	echo $genere->getNome() . ", ";
}
echo "<br/>";