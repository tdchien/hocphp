<?php include_once('views/layouts/header.php'); ?>

<form method="POST">
	<table align="center" border="1" width="500" cellpadding="5" cellspacing="0">
		<tr>
			<td width="150">Fullname</td>
			<td><input type="text" name="fullname" value="<?php echo isset($user['fullname']) ? $user['fullname'] : ''; ?>"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password" value="<?php echo isset($user['password']) ? $user['password'] : ''; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Lưu lại"></td>
		</tr>
	</table>
</form>

<?php include_once('views/layouts/footer.php'); ?>