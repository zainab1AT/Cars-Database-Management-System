<?php
include "db_con.php";

$id = $_GET['id'];
$sql = "DELETE FROM `customer` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index_customer.php?msg=Record deleted successfully");
}
else{
    echo "Failed: ". mysqli_error($conn);
}

?>