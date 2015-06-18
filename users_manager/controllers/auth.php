<?php
$action = isset($_GET['action']) ? $_GET['action'] : false;

// Models
include_once('models/user_model.php');

// Init user model
$user_model = new User_model();

switch ($action) {
	case 'logout':
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		header('location: index.php');
		break;

	case 'login':
	default:
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = isset($_POST['username']) ? $_POST['username'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$login = $user_model->login($username, $password);
			if ($login) {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('location: index.php?controller=user&action=list');
			} else {
				$error = 'Username hoặc password không chính xác';
			}
		}

		// Load view
		include_once('views/auth/login.php');
		break;
}
