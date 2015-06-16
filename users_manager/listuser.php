<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table align="center" border="2px">
    <tr>
        <td>ID Thành Viên</td>
        <td>Tên</td>
        <td>User Name</td>
        <td>Password</td>
        <td>Email</td>
        <td colspan="2"><a href="index.php?page_layout=adduser">Add User</a></a></td>
    </tr>
    <?php
        $sql = "SELECT * FROM users";
        $User = new User();
        $User->query($sql);
        while ($rows = $User->fetch()) {
    ?>
    <tr>
        <td><?php echo $rows['userid']; ?></td>
        <td><?php echo $rows['fullname']; ?></td>
        <td><?php echo $rows['username']; ?></td>
        <td><?php echo $rows['password']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td>
            <a href="index.php?page_layout=edituser&userid=<?php echo $rows['userid']; ?>">Sửa</a>
        </td>
        <td><a href="deluser.php?userid=<?php echo $rows['userid']; ?>">Xóa</a></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>