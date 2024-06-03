<?php
include "db_con.php";

$name = $_GET['name'];
$sql = "DELETE FROM `manufacture` WHERE name ='$name'";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index_manu.php?msg=Record deleted successfully");
}
else{
    echo "Failed: ". mysqli_error($conn);
}

?>