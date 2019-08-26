<?php
// loading from config folder
	require_once 'configs/config.php';
	
//Loading the helpers
	require_once 'helpers/url_redirects.php';
// Class file autoLoader
/**
* Autoloader Must:
* 1. Class name should match it's filename
*/

spl_autoload_register(function($className){
	require_once 'lib/' . $className . '.php';
});