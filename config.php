<?php
session_start();
define("APP_URL", "http://custom-blog-deepak.local");

$conn = mysqli_connect('localhost', 'root', '', 'custom_blog_deepak');

if (!$conn) {
    die("Error at connection with server " . mysqli_connect_error());
}

include_once './functions/users.php';

if (isset($_POST['btnEmail'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = "Name: ".$name."<br>Email: ".$email."<br>Message: ".$_POST['message'];
    $subject = "Message from custom blog";
    $to = "admin@localhost.com";
    $headers = 'From: Deepak<deepak@localhost.com>' . "\r\n";
    @mail($to, $subject, $message, $headers);
    $_SESSION['msg'] = "Email send successfully";
    header('location: '.APP_URL.'/index.php');
    exit;
}
