<?php

require '../config/config.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'user';
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        mysqli_query($db, $sql);
        header('location: ../pages/login-page.php');
    }
    else{
        echo 'Username or email already exists';
    }
}