<?php
ob_start();
session_start();

require_once('libraries/__autoload.php');

// Init database
global $db;
$db = new Database();

// Route
$controller = isset($_GET['controller']) ? $_GET['controller'] : false;
$action = isset($_GET['action']) ? $_GET['action'] : false;

// Check login
if (!isset($_SESSION['username']) OR !isset($_SESSION['password'])) {
	$controller = 'auth';
	$action = 'login';
}

switch ($controller) {
	case 'user':
		include_once('controllers/user.php');
		break;

	default:
		include_once('controllers/auth.php');
		break;
}
