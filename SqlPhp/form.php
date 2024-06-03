
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
echo $query;
        $result = mysqli_query($conn, $query);
        echo $result;
        if ($result) {
         
            header("Location: login.php");
        } else {
            echo '<script>alert("Registration Failed: ' . mysqli_error($conn) . '");</script>';
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>PHP CRUD Operations</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">

        <div class="title">
            Registration Form
        </div>

        <div class="form">
           <div class="input_field">
              <label>First Name</label>
              <input type="text" class="input" name="fname" required>
           </div>

           <div class="input_field">
              <label>Last Name</label>
              <input type="text" class="input" name="lname" required>
           </div>

           <div class="input_field">
              <label>Password</label>
              <input type="password" class="input" name="password" required>
           </div>

           <div class="input_field">
              <label>Confirm Password</label>
              <input type="password" class="input" name="cpassword" required>
           </div>

           <div class="input_field">
              <label>Gender</label>
              <div class="custome_select">
              <select name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
           </div>

           <div class="input_field">
              <label>Email Address</label>
              <input type="email" class="input" name="email" required>
           </div>

           <div class="input_field terms">
              <label class="check">
                 <input type="checkbox" class="input" required>
                 <span class="checkmark"></span>
              </label>
              <p>Agree to terms and conditions</p>
           </div>

           <div class="input_field">
              <input type="submit" value="Register" class="btn" name="register">
           </div>


        </div>
        </form>
    </div>
</body>
</html>
