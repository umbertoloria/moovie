<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
$artisti = $_REQUEST["artisti"];
echo "Attori: ";
$recitazioni = $_REQUEST["recitazioni"];
foreach ($recitazioni as $recitazione) {
	assert($recitazione instanceof Recitazione);
	$artista = $artisti[$recitazione->getAttore()];
	assert($artista instanceof Artista);
	echo $artista->getNome() . ", ";
}
echo "<br/>Registi: ";
$regie = $_REQUEST["regie"];
foreach ($regie as $regia) {
	$artista = $artisti[$regia];
	assert($artista instanceof Artista);
	echo $artista->getNome() . ", ";
}