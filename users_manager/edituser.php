<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php');
}
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
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
        $User->set_userid($userid);
        $User->set_fullname($fullname);
        $User->set_username($username);
        $User->set_password($password);
        $User->set_email($email);
        if ($User->edit() == 'user exist') {
            $error = 'Không thành công';
        }
        else{
            $User->edit();
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
<?php
$User_fetch = new User();
$sql = "SELECT * FROM users WHERE userid = '$userid'";
$User_fetch->query($sql);
$row = $User_fetch->fetch();
?>
<form method="post" name="frm">
    <table border="2px" align="center">
        <tr>
            <td colspan="2" align="center"><?php if (isset($error)) {echo $error;}else{echo "Sửa thông tin thành viên";} ?></td>
        </tr>
        <tr>
            <td>Full name</td>
            <td>
                <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>">
            </td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>
                <input type="text" name="username" value="<?php echo $row['username']; ?>">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="text" name="password" value="<?php echo $row['password']; ?>">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email" value="<?php echo $row['email']; ?>">
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