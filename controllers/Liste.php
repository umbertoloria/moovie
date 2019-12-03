<?php

include "../php/core.php";
$nome = trim(@$_POST["nome"]);
$visibilità = trim(@$_POST["visibilità"]);

$valid = Validator\validate("../forms/creazione_lista.json", [
	"nome" => $nome,
	"visibilità" => $visibilità
]);

if (!$valid)
	echo "Il client non ti ha bloccato?";
else
	echo "boh...";

// TODO: Implementami plz (sono il duale del form in /views/Form di creazione lista.php)