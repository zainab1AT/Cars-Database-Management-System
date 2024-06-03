<?php
session_start();
?><?php

include "db_con.php";

if(isset($_POST['submit'])){
   $id=$_POST['id'];
   $date=$_POST['date'];
   $customer=$_POST['customer'];
   $car=$_POST['car'];


   // Check if the ID already exists in the database
   $checkQuery = "SELECT * FROM orders WHERE id = $id";
   $checkResult = mysqli_query($conn, $checkQuery);

   if(mysqli_num_rows($checkResult) > 0){
       echo '<script>alert("Order with the same ID already exists. Please choose a different ID.");</script>';
   } else {
       // If the ID is unique, proceed with the insertion
       $insertQuery ="INSERT INTO `orders`(`id`, `date`, `customer`, `car`)
       VALUES ($id,'$date','$customer','$car')";
   
       $result = mysqli_query($conn, $insertQuery);
   
       if($result){
           header("Location: index_orders.php?msg=New record created successfully");
       } else {
           echo "Failed: " . mysqli_error($conn);
       }
   }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD APPLICATION</title>
    <?php
       include("db_con.php");
       error_reporting(0);

       $userprofile = $_SESSION['username'];

       if($userprofile == true){

       }
      else{
         header('Location: login.php');
         exit();
       }
      ?>
</head>
<body>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new Order</h3>
            <p class="text-muted">Complete the form below to add a new order</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                 
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">ID:</label>
                            <input type="number" class="form-control" name="id" required>
                        </div>

                        <div class="col">
                            <label class="form-label">Date:</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Customer:</label>
                        <select id="insertCustomer" class="form-control" name="customer" style="width: 100px; height: 40px;" value="<?php echo $row['customer'] ?>" required>
                        <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "projectphp";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                   // Populate the dropdown with options from the manufacture table
                   $result = $conn->query("SELECT id FROM customer");
                   while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
    }
                     ?>
                  </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Car:</label>
                        <select id="insertCar" class="form-control" name="car" style="width: 100px; height: 40px;" value="<?php echo $row['car'] ?>" required>
                        <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "projectphp";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                   // Populate the dropdown with options from the manufacture table
                   $result = $conn->query("SELECT name FROM car");
                   while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
    }
                     ?>
                  </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button> 
                        <a href="index_orders.php" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>