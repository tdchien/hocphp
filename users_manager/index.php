<?php
ob_start();
session_start();

require_once('__autoload.php');

// Init database
global $db;
$db = new Database();

// Route
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	include_once('login.php');
} else {
	$controller = isset($_GET['controller']) ? $_GET['controller'] : false;
	switch ($controller) {
		case 'user':
			include_once('controllers/user.php');
			break;

		default:
			include_once('controllers/user.php');
			break;
	}
}
