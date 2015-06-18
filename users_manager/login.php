<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>User Login</title>
</head>
<body>

<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    if ($_POST['username'] == '') {
        $error = 'Vui lòng nhập username và password';
    } else{
        $username = $_POST['username'];
    }

    if ($_POST['password'] == '') {
        $error = 'Vui lòng nhập username và password';
    } else{
        $password = $_POST['password'];
    }

    if (isset($username) && isset($password)) {
        $user_model = new User_model();
        $check_login = $user_model->login($username, $password);
        if ($check_login) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location:index.php');
        } else {
            $error = 'username hoặc password Không hợp lệ';
        }
    }
}
?>

<form method="post">
    <table border="2px" align="center">
        <tr>
            <td colspan="2"><?php if (isset($error)) {echo $error;}else{echo "Đăng Nhập";} ?></td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>
                <input type="text" name="username">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Đăng Nhập">
                <input type="reset" name="reset" value="Làm Mới">
            </td>
        </tr>
    </table>
</form>
</body>
</html>