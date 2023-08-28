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

// Handle placing an order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["place_order"])) {
    // Fetch cart items for the user
    $select_sql = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
    $result = $conn->query($select_sql);

    while ($row = $result->fetch_assoc()) {
        $product_id = $row["product_id"];
        $quantity = $row["quantity"];
        $total_price = $row["total_price"];
        $order_date = date("Y-m-d H:i:s");

        // Insert the order into the order_history table
        $insert_sql = "INSERT INTO order_history (user_id, product_id, quantity, total_price, order_date) VALUES ($user_id, $product_id, $quantity, $total_price, '$order_date')";
        if ($conn->query($insert_sql)) {
            // Remove the item from the shopping_cart table
            $delete_sql = "DELETE FROM shopping_cart WHERE cart_id = " . $row["cart_id"];
            $conn->query($delete_sql);
        } else {
            echo "Error placing order: " . $conn->error;
        }
    }

    echo "Order placed successfully";
}

// Fetch cart items for calculating totals
$select_sql = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
$result = $conn->query($select_sql);

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
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
        <link rel="stylesheet" href="res/css/cart.css">
    <style>

    </style>
</head>
<body>
        <?php include("header.php"); ?>
    <?php if ($result->num_rows === 0) { ?>
        <div class="basket-product">Your cart is empty.
        <a href="shop.php" class="continue-shopping-button">Continue Shopping</a></div>
    <?php } else { ?>
  <main class="clearfix">
            <!-- Display cart items and summary -->
            <div class="basket">
            <div class="basket-labels">
                <ul>
                    <li class="item item-heading">Item</li>
                    <li class="price">Price</li>
                    <li class="quantity">Quantity</li>
                    <li class="subtotal">Subtotal</li>
                </ul>
            </div>
            <?php
            // Fetch cart items for calculating totals
            $select_sql = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
            $result = $conn->query($select_sql);

            $totalPrice = 0;

            while ($row = $result->fetch_assoc()) {
                if (!$row['is_saved_for_later']) {
                    $totalPrice += $row['total_price'];
            ?>
<div class="basket-product">
    <div class="item">
                    <?php
            // Fetch product details based on product_id
            $product_id = $row['product_id'];
            $product_sql = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";
            $product_result = $conn->query($product_sql);
            if ($product_result->num_rows > 0) {
                $product = $product_result->fetch_assoc();
            ?>

        <div class="product-image">
            <img src="<?php echo $product["thumbnail_image"]; ?>" alt="<?php echo $product["title"]; ?>" class="product-frame">
        </div>
        <div class="product-details">

            <h1><strong><span class="item-quantity"><?php echo $row['quantity']; ?></span> x <?php echo $product['title']; ?></strong></h1>
            <p><strong><?php echo $row['color']; ?></strong></p>
            <p>Product Code - <?php echo $product['product_id']; ?></p>
                    <div class="shipping-address">
            Shipping Address: <?php echo $row['location']; ?>
        </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="price"><?php echo $product['price_list']; ?>
        <s><?php echo $product['price_mrp']; ?></s>
    </div>
    <div class="quantity">
        <?php echo $row['quantity']; ?> <!-- Display quantity as text -->
    </div>
    <div class="subtotal"><?php echo $row['total_price']; ?></div>
        <div class="remove">
        <a href="cart.php?action=remove&cart_id=<?php echo $row['cart_id']; ?>" class="glass-button remove-button">
          <span class="button-icon"><i class="fas fa-trash"></i></span>
          Remove
        </a>

        </div></div>
            <?php
                    }
                }
            ?>
        </div>
        <aside>
            <div class="summary">
                <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
                <div class="summary-subtotal">
                    <div class="subtotal-title">MRP Total</div>
                    <div class="subtotal-value final-value" id="basket-subtotal"><s><?php echo $totalMRP; ?></s></div>
                    <div class="subtotal-title">Savings</div>
                    <div class="subtotal-value final-value" id="basket-subtotal"><?php echo $totalMoneySaved; ?></div>
                </div>
                <div class="summary-total">
                    <div class="total-title">Total</div>
                    <div class="total-value final-value" id="basket-total"><?php echo $totalPrice; ?></div>
                </div>
                <div class="summary-checkout">
                    <a href="checkout.php" class="checkout-cta">Checkout</a>
                </div>
            </div>
        </aside>
    </main>
        <?php } ?>
            <?php include("footer.php"); ?>


</body>
</html>




