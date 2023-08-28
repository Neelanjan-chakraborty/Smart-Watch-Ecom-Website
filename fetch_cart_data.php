<?php
session_start();
require_once "db_connection.php"; // Replace with your database connection code

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION["user_id"]; // Replace with the way you get the logged-in user's ID

// Fetch updated cart data
$select_sql = "SELECT SUM(total_price) AS subtotal FROM shopping_cart WHERE user_id = $user_id AND is_saved_for_later = 0";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();
$subtotal = $row['subtotal'];

$total = $subtotal; // You can add any additional calculations here

// Return cart data in JSON format
$cartData = [
    "subtotal" => $subtotal,
    "total" => $total
];

header("Content-Type: application/json");
echo json_encode($cartData);
?>
