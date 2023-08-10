<?php
require_once "db_connection.php";

if (isset($_GET["cart_id"])) {
    $cartId = $_GET["cart_id"];
    $sql = "INSERT INTO wishlist (user_id, product_id) SELECT user_id, product_id FROM cart WHERE cart_id = $cartId";
    if ($conn->query($sql) === TRUE) {
        $deleteSql = "DELETE FROM cart WHERE cart_id = $cartId";
        if ($conn->query($deleteSql) === TRUE) {
            header("Location: cart.php");
            exit;
        } else {
            echo "Error moving to wishlist: " . $conn->error;
        }
    } else {
        echo "Error moving to wishlist: " . $conn->error;
    }
}

$conn->close();
?>
