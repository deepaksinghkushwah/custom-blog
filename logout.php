<?php
include 'config.php';
unset($_SESSION['isLoggedIn']);
unset($_SESSION['user']);
$_SESSION['msg'] = "You are logged out";
header('location: ' . APP_URL . '/login.php');
exit;
