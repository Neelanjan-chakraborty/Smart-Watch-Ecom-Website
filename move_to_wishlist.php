<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];

    // Get the cart item details
    $sql_cart_item = "SELECT * FROM cart WHERE cart_id = $cart_id";
    $result_cart_item = mysqli_query($conn, $sql_cart_item);

    if (mysqli_num_rows($result_cart_item) > 0) {
        $cart_item = mysqli_fetch_assoc($result_cart_item);
        $user_id = $_SESSION['user_id'];
        $product_id = $cart_item['product_id'];

        // Check if the product is already in the wishlist
        $sql_check_wishlist = "SELECT * FROM wishlist WHERE user_id = $user_id AND product_id = $product_id";
        $result_check_wishlist = mysqli_query($conn, $sql_check_wishlist);

        if (mysqli_num_rows($result_check_wishlist) == 0) {
            // Add the item to the wishlist
            $sql_add_to_wishlist = "INSERT INTO wishlist (user_id, product_id) VALUES ($user_id, $product_id)";
            mysqli_query($conn, $sql_add_to_wishlist);
        }

        // Remove the item from the cart
        $sql_remove_from_cart = "DELETE FROM cart WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql_remove_from_cart);
    }
}

// Redirect back to the cart page
header("Location: add_to_cart.php");
exit();
?>
