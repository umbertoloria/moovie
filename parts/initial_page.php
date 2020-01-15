<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/php/core.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/parts/head.php";

// pagename_map
$pagename_map = [
	"/classifica_film.php" => "classifica film",
	"/suggerimenti_automatici.php" => "suggerimenti automatici",
	"/giudizi.php" => "giudizi",
	"/promemoria.php" => "promemoria",
	"/amici.php" => "amici",
	"/aggiungi_un_film.php" => "aggiungi film",
	"/aggiungi_un_artista.php" => "aggiungi artista",
	"/aggiungi_un_genere.php" => "aggiungi genere",
	"/accesso.php" => "accesso",
	"/registrazione.php" => "registrazione",
	"/cambia_password.php" => "cambia password"
];
if ($logged_user = Auth::getLoggedUser()) {
	// tipo_utente
	$_REQUEST["tipo_utente"] = $logged_user->isGestore() ? "gestore" : "normale";
	$_REQUEST["id_utente"] = $logged_user->getID();
	$_REQUEST["nome_completo_utente"] = $logged_user->getNome() . " " . $logged_user->getCognome();
	// pagename_map
	$pagename_map["/utente.php?id={$logged_user->getID()}"] = "profilo";
	// numero_promemoria
	$promemoria_dao = PromemoriaDAOFactory::getPromemoriaDAO();
	$_REQUEST["numero_promemoria"] = count($promemoria_dao->get_from_utente($logged_user->getID()));
	unset($promemoria_dao);
	// numero_richieste_da_accettare
	$numero_richieste_da_accettare = 0;
	$amicizia_dao = AmiciziaDAOFactory::getAmiciziaDAO();
	foreach ($amicizia_dao->getRequests($logged_user->getID()) as $richiesta)
		if ($richiesta->getUtenteFrom() !== $logged_user->getID())
			$numero_richieste_da_accettare++;
	unset($amicizia_dao);
	unset($richiesta);
	$_REQUEST["numero_richieste_da_accettare"] = $numero_richieste_da_accettare;
	unset($numero_richieste_da_accettare);
} else {
	// tipo_utente
	$_REQUEST["tipo_utente"] = "ospite";
}
unset($logged_user);

//preg_match('/\\/[a-zA-Z0-9_]+.php/', $_SERVER["REQUEST_URI"], $matches);
$_REQUEST["pagename"] = @$pagename_map[$_SERVER["REQUEST_URI"]];
unset($pagename_map);

include $_SERVER["DOCUMENT_ROOT"] . "/views/Leftmenu.php";

unset($_REQUEST["id_utente"]);
unset($_REQUEST["nome_completo_utente"]);
unset($_REQUEST["numero_promemoria"]);
unset($_REQUEST["numero_richieste_da_accettare"]);
unset($_REQUEST["pagename"]);
$_REQUEST["search_users_too"] = $_REQUEST["tipo_utente"] != "ospite";
unset($_REQUEST["tipo_utente"]);

include $_SERVER["DOCUMENT_ROOT"] . "/views/ricerca/Area di ricerca.php";
unset($_REQUEST["search_users_too"]);