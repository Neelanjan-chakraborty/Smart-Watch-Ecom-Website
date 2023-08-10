<?php
$servername = "localhost"; // The default server name for your local MySQL database
$username = "root";        // The default username for MySQL in XAMPP is usually "root"
$password = "";            // By default, XAMPP doesn't set a password for the root user
$dbname = "ecommerce_db";  // Your database name, as previously created

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>