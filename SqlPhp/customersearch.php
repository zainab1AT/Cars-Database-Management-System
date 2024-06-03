<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include "db_con.php";

    // Sanitize user input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM customer WHERE id='$id'";

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
                     echo "<th scope='col'>First Name</th>";
                     echo "<th scope='col'>Last Name</th>";
                     echo "<th scope='col'>Address</th>";
                     echo "<th scope='col'>Job</th>";
                 echo"</tr>";
      
                echo "</thead>";
                echo"<tbody>";

                        ?>
                          <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['f_name'] ?></td>
                            <td><?php echo $row['l_name'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['job'] ?></td>
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

