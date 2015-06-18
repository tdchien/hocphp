<?php
$action = isset($_GET['action']) ? $_GET['action'] : false;

// Models
include_once('models/user_model.php');

// Init user model
$user_model = new User_model();

switch ($action) {
	case 'edit':
		$user_id = isset($_GET['id']) ? $_GET['id'] : false;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = $_POST;
			$result = $user_model->save($data, $user_id);
		}

		$user = $user_model->getOne($user_id);
		if ($user) {
			$data['user'] = $user;
		}

		// Load view
		include_once('views/user/edit.php');
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
