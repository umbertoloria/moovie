<?php

class Testing {

	private static $testing = false;

	public static function init() {
		self::$testing = true;
	}

	public static function running() {
		return self::$testing;
	}

	public static function redirect($url) {
		if (self::$testing)
			echo "header -> $url";
		else
			header("Location: $url");
	}

	public static function assert_message($response, $msg) {
		$result = [1 => null];
		preg_match("/<div id='form_error'><p>(.*)<\/p>/", $response, $result);
		return $result[1] === $msg;
	}

	public static function assert_redirect($response, $url) {
		return $response === "header -> $url";
	}

	// feedback

	private static $feedback = null;

	public static function getFeedback() {
		return self::$feedback;
	}

	public static function setFeedback($feedback) {
		self::$feedback = $feedback;
	}

}