<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "repair";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you're using POST method to send JSON data
$data = json_decode(file_get_contents("php://input"), true);

foreach ($data as $columnName => $cellValue) {
    $cellValue = mysqli_real_escape_string($conn, $cellValue);
    $sql = "UPDATE details SET $columnName = '$cellValue' WHERE id = "; // Add the appropriate WHERE condition
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>
