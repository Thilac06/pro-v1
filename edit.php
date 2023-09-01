<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Record</title>
    <link rel="shortcut icon" type="x-icon" href="maintenance.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" media="screen">
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "repair";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edit_id = $_GET['id']; // Make sure to validate and sanitize this value

        $new_date = $_POST['date'];
        $new_rdate = $_POST['rdate'];
        $new_school = $_POST['school'];
        $new_object = $_POST['object'];
        $new_defect = $_POST['defect'];
        $new_quantity = $_POST['quantity'];
        $new_cost = $_POST['cost'];

        // Update the record in the database
        $update_sql = "UPDATE details SET cdate='$new_date', return_date='$new_rdate', school='$new_school', cobject='$new_object', defect='$new_defect', quantity='$new_quantity', cost='$new_cost' WHERE id=$edit_id";
        if (mysqli_query($conn, $update_sql)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    $edit_id = $_GET['id']; // Make sure to validate and sanitize this value

    $sql = "SELECT * FROM details WHERE id = $edit_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>

        <form action="edit.php?id=<?php echo $edit_id; ?>" method="post">
            <div class="wrapper">
                <div class="conn">
                    <label for="date">1. Date</label>
                    <input type="date" name="date" id="date" class="dd" value="<?php echo $row['cdate']; ?>" required>
                    <label for="rdate">Return Date</label>
                    <input type="date" name="rdate" id="rdate" class="dd" value="<?php echo $row['return_date']; ?>" required>
                </div>
                <div class="conn">
                    <label for="school">2. School</label>
                    <input type="text" name="school" id="school" class="ss" value="<?php echo $row['school']; ?>" required>
                </div>
                <div class="conn">
                    <label for="object">3. Object</label>
                    <input type="text" name="object" id="object" class="oo" value="<?php echo $row['cobject']; ?>" required>
                </div>
                <div class="conn">
                    <label for="defect">4. Defect</label>
                    <input type="text" name="defect" id="defect" class="box" value="<?php echo $row['defect']; ?>">
                </div>
                <div class="conn">
                    <label for="quantity">5. Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="qq" value="<?php echo $row['quantity']; ?>" required>
                </div>
                <div class="conn">
                    <label for="cost">6. Cost</label>
                    <input type="text" name="cost" id="cost" class="co" value="<?php echo $row['cost']; ?>">
                </div>
                <div class="btn" onclick="showalert">
                    <input type="submit" value="Save">
                </div>
            </div>
            <script>
                function showalert(){
                    alert("conform");
                }
            </script>
        </form>

        <?php
    } else {
        echo "Record not found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
