<?php

class DB {

	/** @var PDO $c */
	public static $c;

	public static function init() {
		try {
			$host = "";
			$db = "";
			$usr = "";
			$pwd = "";
			self::$c = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usr, $pwd);
		} catch (PDOException $e) {
			die("MySQL error connection: " . $e->getMessage());
		}
	}

	public static function stmt($sql) {
		return self::$c->prepare($sql);
	}

}

DB::init();