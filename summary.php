<!DOCTYPE html>
<html>
<head>
  <title>Data Summary</title>
  <link rel="shortcut icon" type="x-icon" href="maintenance.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1 class="title">Data Summary</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "repair";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $sql = "SELECT * FROM details WHERE cdate >= '$startDate' AND return_date <= '$endDate'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='summary-table'>";
            echo "<tr><th>Date</th><th>Return Date</th><th>School</th><th>Object</th><th>Defect</th><th>Quantity</th><th>Cost</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['cdate'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "<td>" . $row['school'] . "</td>";
                echo "<td>" . $row['cobject'] . "</td>";
                echo "<td>" . $row['defect'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='no-data-message'>No data found within the specified date range.</p>";
        }
    }

    mysqli_close($conn);
    ?>
  </div>
</body>
</html>
