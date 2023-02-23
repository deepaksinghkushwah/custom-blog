<?php

function createBlog($conn, $title, $content, $createdBy)
{
    $sql = "INSERT INTO `blogs` SET `title` = '$title', `content` = '$content', `created_by` = '$createdBy', `created_at` = '" . date('Y-m-d H:i') . "'";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = 'Blog Created';
    } else {
        exit(mysqli_error($conn));
    }

    header('location: ' . APP_URL . '/dashboard.php');
    exit;
}

function updateBlog($conn, $id, $title, $content, $createdBy)
{
    $sql = "UPDATE `blogs` SET `title` = '$title', `content` = '$content' WHERE `created_by` = '$createdBy' AND id = '$id'";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = 'Blog updated';
    } else {
        exit(mysqli_error($conn));
    }

    header('location: ' . APP_URL . '/dashboard.php');
    exit;
}

function populateDemoData($conn)
{
    $faker = Faker\Factory::create();
    
    for ($i = 1; $i <= 100; $i++) {
        $title = $faker->sentence(30);
        $content = mysqli_real_escape_string($conn,$faker->paragraph(5));
        $createdBy = $_SESSION['user']['id'];
        $sql = "INSERT INTO `blogs` SET `title` = '$title', `content` = '$content', `created_by` = '$createdBy', `created_at` = '" . date('Y-m-d H:i') . "'";
        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['msg'] = 'Blog Created';
        } else {
            exit(mysqli_error($conn));
        }        
    }
}

function addComment($conn, $blogID, $comment, $userID){
    $sql = "INSERT INTO `comments` SET `created_by` = '$userID', `blog_id` = '$blogID', `comment` = '$comment', `created_at` = '".date('Y-m-d H:i')."'";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = "Comment Added";
        header('location: '.APP_URL.'/blog-detail.php?id='.$blogID);
        exit;
    } else {
        exit(mysqli_error($conn));
    }      
    
}