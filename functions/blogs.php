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

function populateDemoData($conn)
{
    $faker = Faker\Factory::create();
    
    for ($i = 1; $i <= 1000; $i++) {
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
