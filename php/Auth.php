<?php

class Auth {

	private static $user_cache = null;

	public static function init() {
		$account_dao = AccountDAOFactory::getAccountDAO();
		if (isset($_COOKIE["userid"]))
			self::$user_cache = $account_dao->get_from_id($_COOKIE["userid"]);
	}

	/** @return Utente? */
	public static function getLoggedUser() {
		return self::$user_cache;
	}

	public static function setLoggedUser(Utente $utente) {
		self::$user_cache = $utente;
		if (Testing::running())
			$_COOKIE["userid"] = $utente->getID();
		else
			setcookie("userid", $utente->getID(), time() + 60 * 60 * 3, "/");
	}

	public static function delLoggedUser() {
		self::$user_cache = null;
		setcookie("userid", null, time(), "/");
	}

}

Auth::init();