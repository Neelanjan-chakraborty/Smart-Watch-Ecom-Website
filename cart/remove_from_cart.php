<?php
require_once "db_connection.php";

if (isset($_GET["cart_id"])) {
    $cartId = $_GET["cart_id"];
    $sql = "DELETE FROM cart WHERE cart_id = $cartId";
    if ($conn->query($sql) === TRUE) {
        header("Location: cart.php");
        exit;
    } else {
        echo "Error removing from cart: " . $conn->error;
    }
}

$conn->close();
?>
