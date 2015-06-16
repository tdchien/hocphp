<?php
ob_start();
session_start();
include_once('User.php');
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php');
}
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $User = new User();
    $User->set_userid($userid);
    $User->del();
    header('location:index.php');
}
?>