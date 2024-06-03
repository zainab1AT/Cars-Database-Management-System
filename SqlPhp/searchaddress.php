<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include "db_con.php";

    // Sanitize user input to prevent SQL injection
    $AddressID = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM address WHERE id='$AddressID'";

    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-hover text-center'>";
              while ($row = mysqli_fetch_assoc($result)) {

                       
                echo "<thead class='table-dark'>";
                   echo "<tr>";
                     echo "<th scope='col'>ID</th>";
                     echo "<th scope='col'>Building</th>";
                     echo "<th scope='col'>Street</th>";
                     echo "<th scope='col'>City</th>";
                     echo "<th scope='col'>Country</th>";
                 echo"</tr>";
      
                echo "</thead>";
                echo"<tbody>";

                        ?>
                          <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['buidling'] ?></td>
                            <td><?php echo $row['street'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><?php echo $row['country'] ?></td>
                          </tr>
                        <?php
                      
                 
               echo" </tbody>";

            }
            echo "</table>";
        } else {
            echo '<script>alert("There is no any Result ! ");</script>';
        }
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
