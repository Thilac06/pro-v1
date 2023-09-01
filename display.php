<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link rel="shortcut icon" type="x-icon" href="maintenance.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Repair Details</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "repair";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM details";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Date</th>
                    <th>Return Date</th>
                    <th>School</th>
                    <th>Object</th>
                    <th>Defect</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Actions</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['cdate'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "<td>" . $row['school'] . "</td>";
                echo "<td>" . $row['cobject'] . "</td>";
                echo "<td>" . $row['defect'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No data found.";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
