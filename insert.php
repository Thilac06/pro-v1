<?php
// Replace these with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "repair";

// Create a connection to the database
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the number of employees from the form
$numEmployees = $_POST["num_employees"];

// Prepare and execute the SQL statement to insert data into the table
$stmt = $conn->prepare("INSERT INTO employees (numemployees) VALUES (?)");
$stmt->bind_param("i", $numEmployees);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
