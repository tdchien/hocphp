<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin CP</title>
</head>
<body>
<p align="center">Xin Chào <font color="red"><?php echo $_SESSION['username']; ?></font> Đã Đăng nhập vào trang Quản Trị - <a href="logout.php">Đăng Xuất</a></p>
<?php
if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
        case 'edituser':include_once('edituser.php'); break;
        case 'adduser':include_once('adduser.php'); break;
        default:include_once('listuser.php');
    }
}
else{
    include_once('listuser.php');
}
?>
</body>
</html>