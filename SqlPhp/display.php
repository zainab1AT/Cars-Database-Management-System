<?php
session_start();
?>

<html>
   <head>
     <title>Display</title>
     <style>
        body{
           background: rgb(227, 97, 253);
        }
        table{
            background: white;
        }
     </style>
   </head>

</html>


<?php
include("db_con.php");
error_reporting(0);

$userprofile = $_SESSION['username'];

if($userprofile == true){

}
else{
   header('Location: login.php');
}

$query="SELECT * FROM users";
$data=mysqli_query($conn, $query);
$total=mysqli_num_rows($data);

//echo $total;

if($total != 0){

    ?>

    <h2 align="center"><mark>Customer Table</mark></h2>
    <center><table border="1" cellspacing="7" width="85%">
        <tr>
          <th width="5%">ID</th>
          <th width="8%">First Name</th>
          <th width="8%">Last Name</th>
          <th width="10%">Gender</th>
          <th width="20%">Email</th>
          <th width="15%">Actions</th>
        </tr>

    <?php

    while($result = mysqli_fetch_assoc($data)){
         echo " <tr>
                  <td>".$result['id']."</td>
                  <td>".$result['fname']."</td>
                  <td>".$result['lname']."</td>
                  <td>".$result['gender']."</td>
                  <td>".$result['email']."</td>

                  <td><a href='update_design.php? id=$result[id] '>Update</a></td>
                </tr>";
    }

}
else{
   echo "No records found" ;
}
?> 
</table>
</center>

<a href="logout.php"><input type="submit" name="" value="LogOut" style="background: blue ; 
color: white; hieght: 35px; width: 100px; margin-top: 20px;
 font-size: 18px;border:0;border-radius:5px; cursor: pointer;"></a>