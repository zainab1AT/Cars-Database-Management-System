<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include "db_con.php";

    // Sanitize user input to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $sql = "SELECT * FROM manufacture WHERE name='$name'";

    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-hover text-center'>";
              while ($row = mysqli_fetch_assoc($result)) {

                       
                echo "<thead class='table-dark'>";
                   echo "<tr>";
                     echo "<th scope='col'>Name</th>";
                     echo "<th scope='col'>Type</th>";
                     echo "<th scope='col'>City</th>";
                     echo "<th scope='col'>Country</th>";
                 echo"</tr>";
      
                echo "</thead>";
                echo"<tbody>";

                        ?>
                          <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['City'] ?></td>
                            <td><?php echo $row['Country'] ?></td>
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
