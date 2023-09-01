<!DOCTYPE html>
<html>
<head>
  <title>Display Data</title>
  <link rel="shortcut icon" type="x-icon" href="maintenance.png">
  <link rel="stylesheet" href="style.css">
</head>
<a href="serch.html"><div class="ser">Serch</div></a>
<body>
  <div class="container">
    <h1><font size='8' color="black" face="Helvetica">Repair Details</font></h1>
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
        echo "<div class='table-container'>";
        echo "<div class='table-header'>";
        echo "<div class='table-cell'>Date</div>";
        echo "<div class='table-cell'>Return Date</div>";
        echo "<div class='table-cell'>School</div>";
        echo "<div class='table-cell'>Object</div>";
        echo "<div class='table-cell'>Defect</div>";
        echo "<div class='table-cell'>Quantity</div>";
        echo "<div class='table-cell'>Cost</div>";
        echo "</div>";

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='table-row' data-row-id='" . $row['id'] . "'>";
          echo "<div class='table-cell  cdate'>" . $row['cdate'] . "</div>";
          echo "<div class='table-cell return_date'>" . $row['return_date'] . "</div>";
          echo "<div class='table-cell  school'>" . $row['school'] . "</div>";
          echo "<div class='table-cell  cobject'>" . $row['cobject'] . "</div>";
          echo "<div class='table-cell defect'>" . $row['defect'] . "</div>";
          echo "<div class='table-cell  quantity'>" . $row['quantity'] . "</div>";
          echo "<div class='table-cell  cost'>" . $row['cost'] . "</div>";
          echo "<div class='table-cell edit-btn'><a href='edit.php?id=" . $row['id'] . "'>Edit</a></div>";
          echo "<div class='table-cell delete-btn'><a href='delete.php?id=" . $row['id'] . "'>Delete</a></div>";
          echo "<div class='table-cell edit-btn'><a href='edit.php?id=" . $row['id'] . "'>Edit</a></div>";
         
          echo "</div>";
        }
    } else {
        echo "<div class='ms'>No data found.</div>";
    }

    mysqli_close($conn);
    ?>
  </div>

  <button class="sbtn" id="saveButton" >Save Changes</button>
  </div>
  

  

</body>
</html>
