<?php
include 'config.php';
checkLogin();

$result = mysqli_query($conn, "DELETE FROM `blogs` WHERE id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "' AND created_by = '" . $_SESSION['user']['id'] . "'");

// if blog not found
if (mysqli_affected_rows($conn) > 0) {
	$_SESSION['msg'] = "Blog Deleted";
} else {
	$_SESSION['err_msg'] = "You are not authorized to delete this blog";
}
header('location: ' . APP_URL . '/dashboard.php');
exit;
