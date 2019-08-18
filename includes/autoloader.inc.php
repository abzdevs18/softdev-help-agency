<?php

/**
* What this doing is loading the classes we instantiate inside the file
* automatically without including the specific file
*/
spl_autoload_register('autoLoader');
function autoLoader($className){
	$path = "classes/";
	$extension = ".class.php";
	$fullpath = $path . $className . $extension;

	if (!file_exists($fullpath)) {
		return false;
	}

	include $fullpath;
}