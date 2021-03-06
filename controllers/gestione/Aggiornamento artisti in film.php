<?php

include_once "../../php/core.php";

allowOnlyGestore();

$film_id = trim(@$_POST["film_id"]);

$final_recs = [];
foreach ($_POST as $key => $val) {
	if (Formats\startswith("rec_", $key)) {
		$ind = substr($key, 4, -4);
		if (Formats\endswith("_att", $key))
			$final_recs[$ind]["att"] = trim($val);
		elseif (Formats\endswith("_per", $key))
			$final_recs[$ind]["per"] = trim($val);
	}
}

$recitazioni_da_salvare = [];
foreach ($final_recs as $final_rec)
	$recitazioni_da_salvare[] = new Recitazione($film_id, $final_rec["att"], $final_rec["per"]);

$registi_da_salvare = [];
foreach ($_POST as $key => $val)
	if (Formats\startswith("reg_", $key))
		$registi_da_salvare[substr($key, 4)] = $val;

$ff = new FormFeedbacker();

$film_dao = FilmDAOFactory::getFilmDAO();
$recitazione_dao = RecitazioneDAOFactory::getRecitazioneDAO();
$regia_dao = RegiaDAOFactory::getRegiaDAO();

if (!$film = $film_dao->findByID($film_id))
	$ff->block();
elseif ($recitazione_dao->setOnly($film->getID(), $recitazioni_da_salvare)
	and $regia_dao->setOnly($film->getID(), $registi_da_salvare))
	header("Location: /film.php?id=" . $film->getID());
else
	$ff->bug();

$ff->process();