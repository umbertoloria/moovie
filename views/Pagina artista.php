<?php

$artista = $_REQUEST["artista"];
assert($artista instanceof Artista);

echo "Questo artista si chiama " . $artista->getNome();
