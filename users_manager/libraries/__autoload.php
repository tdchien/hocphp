<?php
function __autoload($filename){
	if (file_exists("models/{$filename}.php")) {
		include_once('models/'. strtolower($filename) .'.php');
	} elseif (file_exists("libraries/{$filename}.php")) {
		include_once('libraries/'. strtolower($filename) .'.php');
	} else {
		die('Unable load resource');
	}
}
