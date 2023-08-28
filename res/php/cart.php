<?php
session_start();
require_once "db_connection.php"; // Replace with your database connection code

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION["user_id"]; // Replace with the way you get the logged-in user's ID

if (isset($_GET["action"]) && isset($_GET["cart_id"])) {
    $action = $_GET["action"];
    $cart_id = $_GET["cart_id"];

    if ($action === "remove") {
        // Remove the product from the cart
        $sql = "DELETE FROM shopping_cart WHERE cart_id = $cart_id AND user_id = $user_id";
        if ($conn->query($sql)) {
            header("Location: cart.php");
        } else {
            echo "Error removing product from cart: " . $conn->error;
        }
    } elseif ($action === "save_for_later") {
        // Mark the product as saved for later
        $sql = "UPDATE shopping_cart SET is_saved_for_later = TRUE WHERE cart_id = $cart_id AND user_id = $user_id";
        if ($conn->query($sql)) {
            header("Location: cart.php");
        } else {
            echo "Error marking product as saved for later: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
$result = $conn->query($sql);

$totalPrice = 0;
$totalMRP = 0;
$totalMoneySaved = 0;

while ($row = $result->fetch_assoc()) {
    if (!$row['is_saved_for_later']) { // Exclude saved for later items
        $totalPrice += $row['total_price'];
        $totalMRP += $row['total_mrp'];
        $totalMoneySaved += $row['money_saved'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

<style>
/* Basic styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Header styling */
h2 {
    color: #333;
    margin-bottom: 20px;
}

/* Cart item details */
.card-title {
    font-size: 1.25rem;
    color: #333;
    margin-bottom: 10px;
}

.card-text {
    color: #666;
    margin-bottom: 8px;
}

/* Buttons styling */
.btn {
    padding: 8px 20px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c0392b;
}

.btn-secondary {
    background-color: #3498db;
    border: none;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #2980b9;
}

/* Total card styling */
.total-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: right;
    margin-top: 20px;
}

.total-card h5 {
    color: #333;
}

/* Save for later button */
.save-button {
    background-color: #f39c12;
    border: none;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
    margin-left: 5px;
}

.save-button:hover {
    background-color: #d68910;
}

/* Remove button */
.remove-button {
    background-color: #e74c3c;
    border: none;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
    margin-left: 5px;
}

.remove-button:hover {
    background-color: #c0392b;
}


</style>
</head>
<body>
        <?php include("header.php"); ?>
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (!$row['is_saved_for_later']) {
                // Fetch product details based on product_id
                $product_id = $row['product_id'];
                $product_sql = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";
                $product_result = $conn->query($product_sql);
                $product = $product_result->fetch_assoc();
        ?>
        <div class="col-md-6 mb-3">
            <div class="card">
                <!-- Card details here -->
                <h5 class="card-title"><?php echo $product['title']; ?></h5>
                <!--<img src="<?php echo $product["thumbnail_image"]; ?>" alt="<?php echo $product["title"]; ?>" class="img-fluid"> -->
                <p class="card-text">Color: <?php echo $row['color']; ?></p>
                <p class="card-text">Total Price: ₹<?php echo $row['total_price']; ?></p>
                <p class="card-text">MRP Price: ₹<?php echo $row['total_mrp']; ?></p>
                <p class="card-text">Money Saved: ₹<?php echo $row['money_saved']; ?></p>
                <a href="cart.php?action=remove&cart_id=<?php echo $row['cart_id']; ?>" class="btn btn-danger remove-button">Remove</a>
                <a href="cart.php?action=save_for_later&cart_id=<?php echo $row['cart_id']; ?>" class="btn btn-secondary save-button ml-2">Save for Later</a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>

    <!-- Total Price Card -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Total</h5>
            <p class="card-text">Cart Total Price: ₹<?php echo $totalPrice; ?></p>
            <p class="card-text">Cart Total MRP: ₹<s><?php echo $totalMRP; ?></s></p>
            <p class="card-text">Total Money Saved: ₹<?php echo $totalMoneySaved; ?></p>
        </div>
    </div>
    <div class="container text-center mt-4">
    <a href="checkout.php" class="btn btn-primary mr-3">Place Order</a>
    <a href="javascript:history.go(-1)" class="btn btn-secondary">Go Back</a>
</div>
</div>

<?php
include "footer.php"; // Include the footer
?>
</body>
</html>
