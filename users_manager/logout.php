<?php
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    session_destroy();
}
header('location:index.php');

?>