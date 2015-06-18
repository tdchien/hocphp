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
			$result = $user_model->saveOne($data, $user_id);
			if ($result !== false) {
				$data['msg'] = 'Lưu dữ liệu thành công';
			} else {
				$data['err'] = 'Có lỗi xảy ra';
			}
		}

		$user = $user_model->getOne($user_id);
		if ($user) {
			$data['user'] = $user;
		}

		// Load view
		include_once('views/user/edit.php');
		break;

	case 'delete':
		$user_id = isset($_GET['id']) ? $_GET['id'] : false;
		if ($user_id) {
			$result = $user_model->deleteOne($user_id);
			if ($result) header('location: index.php?controller=user&action=list');
		}
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
