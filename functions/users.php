<?php

/**
 * All user related function will goes here
 */

function isAdmin()
{
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['user']['role_id'] == 1) {
        return true;
    } else {
        return false;
    }
}

function isAuthorizedAdmin()
{
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['user']['role_id'] == 1) {
        return true;
    } else {
        $_SESSION['err_msg'] = 'You are not authroziedd to view this page.';
        header('location: ' . APP_URL . '/login.php');
        exit;
    }
}


function checkLogin()
{
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
        return true;
    } else {
        return false;
    }
}


function isAuthorized()
{
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
        return true;
    } else {
        $_SESSION['err_msg'] = 'You are not authroziedd to view this page.';
        header('location: ' . APP_URL . '/login.php');
        exit;
    }
}

function regiterUser($conn, $username, $password, $email)
{
    $sql = "SELECT * FROM `users` WHERE `username` ='$username' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['err_msg'] = "Username already in use, please choose another usrname";
        header('location: ' . APP_URL . '/register.php');
        exit;
    } else {
        $password = md5($password);
        $sql = "INSERT INTO `users` SET `username` = '$username', `password` = '$password', `email` = '$email', role_id = '2' ";
        mysqli_query($conn, $sql);
        $_SESSION['msg'] = "You are regisreted succesfully, please login";
        header('location: ' . APP_URL . '/login.php');
        exit;
    }
}

function login($conn, $username, $password)
{
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            // user is found, now match the password
            if ($user['password'] == md5($password)) {
                // password matched
                $_SESSION['isLoggedIn'] = true;
                unset($user['password']);
                $_SESSION['user'] = $user;
                $_SESSION['msg'] = "You are logged in succesfully";
                header('location: ' . APP_URL . '/dashboard.php');
                exit;
            } else {
                // password not matched
                $_SESSION['err_msg'] = "Invalid credentials";
                header('location: ' . APP_URL . '/login.php');
                exit;    
            }
        } else {
            // user not found
            $_SESSION['err_msg'] = "Invalid credentials";
            header('location: ' . APP_URL . '/login.php');
            exit;
        }
    } else {
        // no record found for user
        $_SESSION['err_msg'] = "Invalid credentials";
        header('location: ' . APP_URL . '/login.php');
        exit;
    }
}
