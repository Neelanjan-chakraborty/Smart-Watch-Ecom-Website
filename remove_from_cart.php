<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];

    // Delete the cart item
    $sql_delete_cart = "DELETE FROM cart WHERE cart_id = $cart_id";
    mysqli_query($conn, $sql_delete_cart);
}

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>
