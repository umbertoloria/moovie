<?php
include_once "../../php/core.php";
//allowOnlyGestore();

$utente = Auth::getLoggedUser();
if (is_null($utente) or !$utente->isGestore()) {
    Testing::redirect("/");
    return;
}
$genere_id = trim(@$_POST["genere_id"]);
$ff = new FormFeedbacker();
$genere_dao = GenereDAOFactory::getGenereDAO();
if ($genere_dao->delete($genere_id)) {
    Testing::redirect("/");
    return;
}
else
    $ff->bug();

$ff->process();