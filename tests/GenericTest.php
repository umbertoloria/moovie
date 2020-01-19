<?php

/**
 * @method assertNull($obj)
 * @method assertEquals($a, $b)
 * @method assertTrue($test)
 * @method assertFalse($test)
 * @method assertNotNull($obj)
 */
class GenericTest extends PHPUnit\Framework\TestCase {

	protected function loadFile($name_in_files, $path) {
		$_FILES[$name_in_files] = [];
		// error
		if (!file_exists($path))
			$_FILES[$name_in_files]["error"] = UPLOAD_ERR_NO_FILE;
//		elseif (strlen(file_get_contents($path)) > ini_get("upload_max_filesize")) // : ottengo valori come "2M"
//			$_FILES[$name_in_files]["error"] = UPLOAD_ERR_INI_SIZE;
		else
			$_FILES[$name_in_files]["error"] = UPLOAD_ERR_OK;
		// type
		if (Formats\endswith(".png", $path))
			$_FILES[$name_in_files]["type"] = "image/png";
		elseif (Formats\endswith(".jpg", $path) or Formats\endswith(".jpeg", $path))
			$_FILES[$name_in_files]["type"] = "image/jpeg";
		else
			$_FILES[$name_in_files]["type"] = "";
		// tmp_name
		$_FILES[$name_in_files]["tmp_name"] = getcwd() . "/" . $path;
	}

}