<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Customer Table</title>
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
    <div id=res>
    <nav class="navbar navbar-light justify-content-between fs-3 mb-5"
     style="background-image: linear-gradient(grey, rgb(255, 255, 255));">

     <a href="index.php" class="btn btn-dark">DataBase</a>

    <h1 class="navbar-brand mx-auto">Customer Table</h1>
    
    <a href="logout.php" class="btn btn-dark">LogOut</a>
</nav>

    <div class="container">
        <?php
          if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  '.$msg.'
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }
        ?>


        <!---------------------search customer----------------------------------------------------------->

        <div id="search-container">
    <label  for="id">Customer ID :</label>
    <input type="text" id="id" />
    <button id="myButton">Search</button>
</div>
<br>
<br>

<div id="re"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myButton").click(function () {
            $.post("customersearch.php", {
                id: $("#id").val(),
            }, function (data, status) {
                $("#re").html(data);
            });
        });
    });
</script>

        <a href="add_new_customer.php" id="addbtn" class="btn btn-dark mb-3">Add New</a>

        <table class="table table-hover text-center">           
            <thead class="table-dark">
               <tr>
                 <th scope="col">ID</th>
                 <th scope="col">First Name</th>
                 <th scope="col">Last Name</th>
                 <th scope="col">Address</th>
                 <th scope="col">Job</th>
                 <th scope="col">Action</th>
              </tr>
  
            </thead>
            <tbody>
                <?php
                  include "db_con.php";

                  $sql = "SELECT * FROM `customer`";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) { 
                    ?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['f_name'] ?></td>
                        <td><?php echo $row['l_name'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['job'] ?></td>
                        <td>
                          <a href="edit_customer.php?id=<?php echo $row['id'] ?>" class="link-dark" ><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                          <a href="delete_customer.php?id=<?php echo $row['id'] ?>" class="link-dark" ><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                      </tr>
                    <?php
                  }
                ?>
            </tbody>
        </table>

    </div>
   
   <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>
</html>