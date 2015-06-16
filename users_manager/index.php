<?php
ob_start();
session_start();
include_once('__autoload.php');
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include_once('admincp.php');
}
else{
    include_once('login.php');
}
?>