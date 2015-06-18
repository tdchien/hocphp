<?php include_once('views/layouts/header.php'); ?>

<table align="center" border="2px">
    <tr>
        <td>ID Thành Viên</td>
        <td>Tên</td>
        <td>User Name</td>
        <td>Password</td>
        <td>Email</td>
        <td colspan="2"><a href="index.php?page_layout=adduser">Add User</a></a></td>
    </tr>
    <?php if (isset($data['users']) AND !empty($data['users'])) : ?>
        <?php foreach ($data['users'] as $key => $value) : ?>
        <tr>
            <td><?php echo $value['userid']; ?></td>
            <td><?php echo $value['fullname']; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['password']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><a href="index.php?controller=user&action=edit&id=<?php echo $value['userid']; ?>">Sửa</a></td>
            <td><a href="index.php?controller=user&action=delete&id=<?php echo $value['userid']; ?>">Xóa</a></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Chua co du lieu</td>
        </tr>
    <?php endif; ?>
</table>

<?php include_once('views/layouts/footer.php'); ?>