<?php
session_start();
include "db_con.php";

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname =  $_POST['lname'];
    $password =$_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender =  $_POST['gender'];
    $email =  $_POST['email'];

    // Check if passwords match
    if ($password != $cpassword) {
        echo '<script>alert("Password and Confirm Password do not match");</script>';
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $query = "INSERT into users (`fname`, `lname`, `password`,`cpassword`, `gender`, `email`) values ('$fname', '$lname', '$hashedPassword','$hashedPassword', '$gender', '$email')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: login.php");
        } else {
            echo '<script>alert("Registration Failed: ' . mysqli_error($conn) . '");</script>';
        }
    }
}
?>