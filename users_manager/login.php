<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>

<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    if ($_POST['username'] == '') {
        $error = 'Vui lòng nhập USerName và Password';
    }
    else{
        $username = $_POST['username'];
    }
    if ($_POST['password'] == '') {
        $error = 'Vui lòng nhập USerName và Password';
    }
    else{
        $password = $_POST['password'];
    }

    if (isset($username) && isset($password)) {
        $User = new User();
        $User->set_username($username);
        $User->set_password($password);
        if ($User->login() == 'acc not vaid') {
            $error = 'USerName hoặc Password Không hợp lệ';
        }
        else{
            $User->login();
            header('location:index.php');
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