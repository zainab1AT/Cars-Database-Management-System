<?php
session_start();
?><?php
include "db_con.php";

$name = $_GET['name'];
if(isset($_POST['submit'])){
   $type=$_POST['type'];
   $city=$_POST['city'];
   $country=$_POST['country'];

   $sql = "UPDATE `manufacture` SET `type` = '$type' , `city` = '$city' , `country` = '$country' WHERE name ='$name'";

   $result = mysqli_query($conn, $sql);

   if($result){
      header("Location: index_manu.php ?msg=Data updated successfully");
   }
   else{
       echo "Failed : ".mysqli_error($conn);
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
            <h3>Edit Manufacture Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `manufacture` WHERE name ='$name' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                 
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                        </div>

                        <div class="col">
                            <label class="form-label">Type:</label>
                            <input type="text" class="form-control" name="type" value="<?php echo $row['type'] ?>"><!--placeholder="name@example.com"-->
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">City:</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $row['city'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">MCountry:</label>
                        <input type="text" class="form-control" name="country" value="<?php echo $row['country'] ?>">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button> 
                        <a href="index_manu.php" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>