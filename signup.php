<?php


// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "ecommerce_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password =$_POST['password'];

    $stmt = $mysqli->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $password);

    if ($stmt->execute()) {
        // Success: user data inserted into the database
        echo "User registered successfully!";
    } else {
        // Error: failed to insert user data
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>

