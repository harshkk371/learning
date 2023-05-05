<?php

$con = mysqli_connect("localhost","root","","Avishkar");


// Signup Process
if (isset($_POST['register_submit'])) {
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $pswrepeat = $_POST['pswrepeat'];

    $insert_sql = "INSERT INTO users(email,psw,pswrepeat) VALUES('$email','$psw','$pswrepeat')";
    $res = mysqli_query($con,$insert_sql);
}

// Login Process
session_start();
if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        header("Location: dashboard.php");
    }
}



?>