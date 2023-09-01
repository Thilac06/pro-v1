<!DOCTYPE html>
<html lang="en">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "repair";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT COUNT(DISTINCT school) AS schoolCount FROM details";
    
    $result = mysqli_query($conn, $sql);
    
    // Fetch the result and get the value of the schoolCount
    $row = mysqli_fetch_assoc($result);
    $schoolCount = $row['schoolCount'];

    $sql1 = "SELECT * FROM employees ORDER BY id DESC LIMIT 1";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastEmployeeData = $row["numemployees"];
    } else {
        $lastEmployeeData = "0";
    }

    
?>


<head>
    <link rel="shortcut icon" type="x-icon" href="maintenance.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="style1.css" media="screen">
</head>
<body>
    <header>
        <div><a href="admin only.html" id="addDetailsLink">ADD DETAILS</a></div>
        <div class="he"><a href="table.php" id="moreLink">More</a></div>
    </header>
    <div class="wrabber1">
        <div class="ns" id="schoolsInvolves">
            <div class="dd"><?php echo $schoolCount; ?></div>
            <div class="tex">NUMBER OF SCHOOLS INVOLVES</div>
        </div>
        <div class="pd" id="numberOfRepairs">
            <!-- Use the fetched result here -->
            <div class="dd"> <?php
                $rowCountQuery = "SELECT COUNT(*) AS rowCount FROM details";
                $rowCountResult = mysqli_query($conn, $rowCountQuery);
                $rowCountRow = mysqli_fetch_assoc($rowCountResult);
                $rowCount = $rowCountRow['rowCount'];
                
                echo $rowCount;
                ?>  </div>
            <div class="tex2">NUMBER OF REPAIRS</div>
        </div>
        <div class="ne" id="numberOfEmployees">
            <div class="dd"><?php echo $lastEmployeeData; ?></div>
            <div class="tex3">NUMBER OF EMPLOYS</div>
        </div>
        <div class="am" id="totalAmount">
            <div class="dd"><?php
            $sumQuery = "SELECT SUM(cost) AS totalCost FROM details";
            $sumResult = mysqli_query($conn, $sumQuery);
            $sumRow = mysqli_fetch_assoc($sumResult);
            $totalCost = $sumRow['totalCost'];

            // Format the total cost in either M or K form
            if ($totalCost >= 1000000) {
                // If total cost is in millions
                $formattedTotalCost = number_format($totalCost / 1000000, 1) . 'M';
            } elseif ($totalCost >= 1000) {
                // If total cost is in thousands
                $formattedTotalCost = number_format($totalCost / 1000, 1) . 'K';
            } else {
                // If total cost is less than 1000
                $formattedTotalCost = number_format($totalCost);
            }

            echo $formattedTotalCost;
            ?></div>
            <div class="tex4">TOTAL AMOUNT</div>
        </div>
    </div>
</body>
</html>
