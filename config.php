<?php
$host = "localhost";
$userName = "dinbis";
$password = "admin";
$dbName = "vehicle_rental";

// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>