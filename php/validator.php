<?php

namespace Validator;

function decode($json_src) {
	return str_replace("\r\n", "\\\r\n", addslashes(file_get_contents($json_src)));
}

function validate($json_filename, $inputs) {
	$json = json_decode(file_get_contents($json_filename));
	foreach ($json->rules as $field => $rules) {
		if (isset($rules->onlyClient) and $rules->onlyClient === true)
			continue;
		$input = @$inputs[$field];

		if (isset($rules->minlength) and isset($rules->maxlength) and (strlen($input) < $rules->minlength or strlen($input) > $rules->maxlength))
			return false;
		elseif (isset($rules->minlength) and strlen($input) < $rules->minlength)
			return false;
		elseif (isset($rules->maxlength) and strlen($input) > $rules->maxlength)
			return false;
		elseif (isset($rules->exp) and !preg_match("/" . $rules->exp . "/", $input))
			return false;
		elseif (isset($rules->equals) and $input !== $inputs[$rules->equals])
			return false;
		elseif (isset($rules->cases) and !in_array($input, $rules->cases))
			return false;
	}
	return true;
}