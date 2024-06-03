<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Login Bage</title>

</head>
<body>
    <div class="center" id="res">
        <h1>Login</h1>

        <form action="#" method="POST" autocomplete="off">

        <div class="form">
            <input type="text" name="username" class="textfield" placeholder="Username" required>
            <input type="password" name="password" class="textfield" placeholder="Password" required>

            <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password ?</a></div>

            <input type="submit" name="login" value="Login" class="btn">

            <div class="signup">New Member ? <a href="form.php" class="link">SignUp Here</a> </div>
        </div>
    </div>

  </form>
  <script>
       
        function message() {
            alert("forget Password");
        }       

    </script>
    
</body>
</html>


<?php

include("db_con.php");

if(isset($_POST['login'])){
   $username=$_POST['username'];
   $password=$_POST['password'];

   $query = "SELECT * FROM users WHERE email = '$username' && password = '$password'";
   $data=mysqli_query($conn,$query);

   $total = mysqli_num_rows($data);
//    echo $total;

if($total == 1){

   $_SESSION['username'] = $username;
   header('Location: index.php');

}
else{
   echo '<script>alert("Login Failed");</script>';
}
}


?>
