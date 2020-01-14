<?php

include "../../php/core.php";

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

if (!$film = $film_dao->get_from_id($film_id))
	$ff->message("Il client non ti ha bloccato?");
elseif ($recitazione_dao->set_only($film->getID(), $recitazioni_da_salvare)
	and RegiaManager::set_only($film->getID(), $registi_da_salvare))
	header("Location: /film.php?id=" . $film->getID());
else
	$ff->bug();

$ff->process();