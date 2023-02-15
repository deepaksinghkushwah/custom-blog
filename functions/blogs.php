<?php

function createBlog($conn, $title, $content, $createdBy){
    $sql = "INSERT INTO `blogs` SET `title` = '$title', `content` = '$content', `created_by` = '$createdBy', `created_at` = '".date('Y-m-d H:i')."'";
    mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        $_SESSION['msg'] = 'Blog Created';
    } else {
        exit(mysqli_error($conn));
    }
    
    header('location: '.APP_URL.'/dashboard.php');
    exit;
}