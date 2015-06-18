<?php include_once('views/layouts/header.php'); ?>
<form method="post">
	<table align="center" width="500" cellpadding="5" cellspacing="0" border="1">
		<tr>
			<td colspan="2">ĐĂNG NHẬP</td>
		</tr>
		<?php if (isset($error)) : ?>
		<tr>
			<td colspan="2" style="color: red; text-align: center;"><?php echo $error; ?></td>
		</tr>
		<?php endif; ?>
		<tr>
			<td>Username</td>
			<td>: <input type="text" name="username"> </td>
		</tr>
		<tr>
			<td>Password</td>
			<td>: <input type="password" name="password"> </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Đăng nhập"></td>
		</tr>
	</table>
</form>
<?php include_once('views/layouts/footer.php'); ?>