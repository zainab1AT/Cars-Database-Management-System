<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include "db_con.php";

    // Sanitize user input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM orders WHERE id='$id'";

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
                     echo "<th scope='col'>Date</th>";
                     echo "<th scope='col'>Customer</th>";
                     echo "<th scope='col'>Car</th>";
                 echo"</tr>";
      
                echo "</thead>";
                echo"<tbody>";

                        ?>
                          <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['customer'] ?></td>
                            <td><?php echo $row['car'] ?></td>
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

