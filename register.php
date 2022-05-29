<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.html");
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $password = $_POST['Password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $sql = "SELECT * FROM registration WHERE username='$username'";
        $result = mysqli_query($connection, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO `registration`     (`name`, `username`, `Email`, `Phone Number`,   `password`)VALUES ('$name', '$username',  '$email', '$phone', '$password')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("Location: login.php");
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        }
        else {
            echo "<script>alert('Woops! username Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>