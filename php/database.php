<?php

class DB {

	/** @type PDO $c */
	private static $c;

	public static function init() {
		try {
			$host = "localhost";
			$db = "moovie";
			$usr = "root";
			$pwd = "ciaociao";
			self::$c = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usr, $pwd);
		} catch (PDOException $e) {
			die("MySQL error connection: " . $e->getMessage());
		}
	}

	public static function stmt($sql) {
		return self::$c->prepare($sql);
	}

	public static function lastInsertedID() {
		return self::$c->lastInsertId();
	}

	public static function beginTransaction() {
		self::$c->beginTransaction();
	}

	public static function rollbackTransaction() {
		self::$c->rollBack();
	}

	public static function commitTransaction() {
		self::$c->commit();
	}

}

DB::init();