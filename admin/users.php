<?php
include '../config.php';
isAuthorizedAdmin();
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'deleteUser'){
        mysqli_query($conn, "DELETE FROM `users` WHERE `id` = '".$_GET['id']."'");
        $_SESSION['msg'] = "User Deleted";
        header('location: '.APP_URL.'/admin/users.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
                    <h1 class="h2">Users</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        &nbsp;
                    </div>
                </div>                
                <div class="table-responsive">
                <?php include './includes/message.php'; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `users`";
                    $results = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($results) > 0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <td><?=$row['email']?></td>
                                <td><?=$row['username']?></td>
                                <td>
                                    <a href="<?=APP_URL.'/admin/user-edit.php?id='.$row['id']?>" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <a href="javascript:void(0);" onclick="javascript:if(confirm('Are you sure want to delete?')) { window.location.href='<?=APP_URL.'/admin/users.php?id='.$row['id'].'&action=deleteUser'?>'}" title="Delete"><i class="bi bi-trash"></i></a>
                                    <a href="<?=APP_URL.'/admin/user-change-password.php?id='.$row['id']?>" title="Change Password"><i class="bi bi-fingerprint"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </table>
                </div>
            </main>
        </div>
    </div>    
</body>

</html>