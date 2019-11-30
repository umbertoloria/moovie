<?php

namespace Validator;

function decode($json_src) {
	return str_replace("\r\n", "\\\r\n", addslashes(file_get_contents($json_src)));
}

function validate($json, $inputs) {
	foreach ($json->rules as $field => $rules) {
		if (isset($rules->onlyClient))
			continue;
		$input = @$inputs[$field];

		if (isset($rules->minlength) && isset($rules->maxlength) && (strlen($input) < $rules->minlength) || strlen($input) > $rules->maxlength)
			return false;
		else if (isset($rules->minlen) && strlen($input) < $rules->minlength)
			return false;
		else if (isset($rules->maxnlen) && strlen($input) > $rules->maxlength)
			return false;
		else if (isset($rules->exp) && !preg_match("/" . $rules->exp . "/", $input))
			return false;
		else if (isset($rules->equals) && $input !== $inputs[$rules->equals])
			return false;
	}
	return true;
}