<?php
include '../config.php';
isAuthorizedAdmin();

if(isset($_POST['btnSaveUser'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $roleID = $_POST['role_id'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id` != $id AND (email = '$email' OR `username` = '$username')";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        // email already used by another user
        $_SESSION['err_msg'] = "Email alredy used by other user";        
    } else {
        // register new email with user
        $sql = "UPDATE `users` SET `email` = '$email', `status` = '$status',`role_id` = '$roleID', `username` = '$username' WHERE `id` = '$id'";
        mysqli_query($conn, $sql);;
        $_SESSION['msg'] = "User updated";    
        header('location: '.APP_URL.'/admin/users.php');
        exit;
    }
}


$sql = "SELECT * FROM `users` WHERE id = '".$_GET['id']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) <= 0){
    $_SESSION['err_msg'] = "User not found";
    header('location: '.APP_URL.'/admin/users.php');
    exit;
}
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?=APP_URL?>/theme/assets/js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>

    </style>
    <link href="./css/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include './includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include './includes/left.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!--<div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            This week
                        </button>-->
                    </div>
                </div>
                <div class="table-responsive">
                    <?php include './includes/message.php'; ?>
                   <form action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input class="form-control" type="email" name="email" value="<?=$user['email']?>" id=""></td>
                        </tr>
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td>
                                <input class="form-control" type="text" name="username" value="<?=$user['username']?>" id="">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="status">Status</label></td>
                            <td>
                                <select class="form-control" name="status" id="">
                                    <option value="1" <?=$user['status'] == 1 ? 'selected' : ''?>>Active</option>
                                    <option value="0" <?=$user['status'] == 0 ? 'selected' : ''?>>Inactive</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="role_id">Role</label></td>
                            <td>
                                <select class="form-control" name="role_id" id="">
                                   <?php
                                   $sql = "SELECT * FROM `roles`";
                                   $result = mysqli_query($conn, $sql);
                                   if(mysqli_num_rows($result) > 0){
                                    while($role = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option <?=$role['id'] == $user['role_id'] ? 'selected' : ''?> value="<?=$role['id']?>"><?=$role['title']?></option>
                                        <?php
                                    }
                                   }
                                   ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-primary" type="submit" name="btnSaveUser">Save</button></td>
                        </tr>
                    </table>
                   </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>