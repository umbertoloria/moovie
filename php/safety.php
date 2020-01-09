<?php

function allowOnlyGestore() {
	$utente = Auth::getLoggedUser();
	if (is_null($utente) or !$utente->isGestore()) {
		header("Location: /");
		die();
	}
}