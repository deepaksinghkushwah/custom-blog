<?php
session_start();
define("APP_URL","http://custom-blog.local");

$conn = mysqli_connect('localhost','root','','custom_blog');

if(!$conn){
    die("Error at connection with server " . mysqli_connect_error());
}

include_once './functions/users.php';
