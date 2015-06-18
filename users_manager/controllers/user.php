<?php
$action = isset($_GET['action']) ? $_GET['action'] : false;

// Models
include_once('models/user_model.php');

// Init user model
$user_model = new User_model();

switch ($action) {
	case 'login':
		break;

	case 'logout':
		break;

	case 'list':
	default:
		// Process data
		$users = $user_model->getAll();
		$data['users'] = $users;

		// Load view
		include_once('views/user/list.php');
		break;
}
