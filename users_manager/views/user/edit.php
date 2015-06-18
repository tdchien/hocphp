<?php include_once('views/layouts/header.php'); ?>

<form method="POST">
	<table align="center" border="1" width="500" cellpadding="5" cellspacing="0">
		<tr>
			<td colspan="2">CẬP NHẬT USER</td>
		</tr>
		<?php if (isset($data['msg']) OR isset($data['err'])) : ?>
		<tr>
			<td colspan="2">
				<?php if (isset($data['msg'])) : ?>
					<div style="color: green"><?php echo $data['msg']; ?></div>
				<?php endif; ?>
				<?php if (isset($data['err'])) : ?>
					<div style="color: red"><?php echo $data['err']; ?></div>
				<?php endif; ?>
			</td>
		</tr>
		<?php endif; ?>
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
			<td>
				<input type="submit" value="Lưu lại">
				<a href="index.php?controller=user&action=list">Quay lại</a>
			</td>
		</tr>
	</table>
</form>

<?php include_once('views/layouts/footer.php'); ?>