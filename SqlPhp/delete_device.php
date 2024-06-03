<?php
include "db_con.php";

$no = $_GET['no'];
$sql = "DELETE FROM `device` WHERE no = $no";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index_device.php?msg=Record deleted successfully");
}
else{
    echo "Failed: ". mysqli_error($conn);
}

?>