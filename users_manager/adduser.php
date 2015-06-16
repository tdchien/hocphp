<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    if ($_POST['fullname'] == '') {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    }
    else{
        $fullname = $_POST['fullname'];
    }
    if ($_POST['username'] == '') {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    }
    else{
        $username = $_POST['username'];
    }
    if ($_POST['password'] == '') {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    }
    else{
        $password = $_POST['password'];
    }
    if ($_POST['email'] == '') {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    }
    else{
        $email = $_POST['email'];
    }
    if (isset($fullname) && isset($username) && isset($password) && isset($email)) {
        $User = new User();
        $User->set_fullname($fullname);
        $User->set_username($username);
        $User->set_password($password);
        $User->set_email($email);
        if ($User->add() == 'user exist') {
            $error = 'Tài khoản bạn nhập vào đã có trên hệ thống';
        }
        else{
            $User->add();
            header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
<form method="post" name="frm">
    <table border="2px" align="center">
        <tr>
            <td colspan="2" align="center"><?php if (isset($error)) {echo $error;}else{echo "Thêm Mới Thành Viên";} ?></td>
        </tr>
        <tr>
            <td>Full name</td>
            <td>
                <input type="text" name="fullname">
            </td>
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
                <input type="text" name="password">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Add User">
                <input type="reset" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>