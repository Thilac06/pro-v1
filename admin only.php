
<html>
    <head>
        <meta charset="utf-8">
        <title>admin only</title>
        <link rel="shortcut icon" type="x-icon" href="maintenance.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" media="screen">
    </head>
    <body>
        <form action="" method="post">
       <div class="wrapper">
        <div class="conn">
            <label for="">1.Date</label>
            <input type="date" name="date" id="" class="dd" required>

            <label for=""> Return Date</label>
            <input type="date" name="rdate" id="" class="dd" required>
        </div>
        <div class="conn">
            <label for="">2.School</label>
            <input type="text" name="school" id="" class="ss" required>
        </div>
        <div class="conn">
            <label for="">3.Object</label>
            <input type="text" name="object" id="" class="oo" required>
        </div>
        <div class="conn">
            <label for="">4.Defect</label>
            <input type="text" name="defect"  class="box">
        </div>
        <div class="conn">
            <label for="">5.Quantity</label>
            <input type="number" name="quantity" id="" class="qq" required>
        </div>
        <div class="conn">
            <label for="">6.Cost</label>
            <input type="text" name="cost" id="" class="co">
        </div>
        <div class="btn">
            <input type="submit" value="save">
        </div>

       </div>
        
    </form> 
    </body>

    
<html>
    <head>
      <title>data</title>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
      
    
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "repair";
    
        $conn = mysqli_connect($servername, $username, $password, $database);
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        
        $date = $_POST["date"];
        $returnDate = $_POST["rdate"];
        $school = $_POST["school"];
        $object = $_POST["object"];
        $defect = $_POST["defect"];
        $quantity = $_POST["quantity"];
        $cost = $_POST["cost"];
    
        
    
        
        $sql = "INSERT INTO details (cdate, return_date, school, cobject, defect, quantity, cost)
                VALUES ('$date', '$returnDate', '$school', '$object', '$defect', '$quantity', '$cost')";
    
        if (mysqli_query($conn, $sql)) {
            echo "<div class='ms'>Data inserted successfully!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        
        mysqli_close($conn);
    }
    ?>
    
    
    </body>
    </html>
    
</html>