<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>User manager</title>
	</head>
<body>
	<?php if (isset($_SESSION['username'])) : ?>
	<p align="center">Xin Chào
		<font color="red"><?php echo $_SESSION['username']; ?></font> Đã Đăng nhập vào trang Quản Trị - <a href="?action=logout">Đăng Xuất</a>
	</p>
	<?php endif; ?>
