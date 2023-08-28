<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (isset($_POST["product_id"])) {
    $user_id = $_SESSION["user_id"];
    $product_id = $_POST["product_id"];
    
    // Insert the product into the wishlist table
    $wishlist_insert_sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
    if ($conn->query($wishlist_insert_sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();
?>
