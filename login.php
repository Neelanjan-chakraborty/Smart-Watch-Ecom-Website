<?php
session_start(); // Start the session
require_once "db_connection.php"; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user["is_verified"] == 1) {
            $_SESSION["loggedin"] = true; // Set session variable
            $_SESSION["first_name"] = $user["first_name"]; // Set first name in session
            $_SESSION["last_name"] = $user["last_name"];   // Set last name in session
            $_SESSION["user_id"] = $user["id"];
            echo "success";
        } else {
            // User is not verified, redirect to signup.php with relevant data
            $_SESSION["signup_email"] = $user["email"];
            $_SESSION["signup_first_name"] = $user["first_name"];
            $_SESSION["signup_last_name"] = $user["last_name"];
            $_SESSION["signup_password"] = $user["password"];
            header("Location: signup.php");
            exit();
        }
    } else {
        echo "error";
    }
}

$conn->close();
?>
