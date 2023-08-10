<?php
session_start();
require_once "db_connection.php"; // Include your database connection

// Handle adding to cart (assuming 'product_id' is passed via GET or POST)
if (isset($_REQUEST['product_id'])) {
    $product_id = $_REQUEST['product_id'];
    $user_id = $_SESSION['user_id'];

    // Check if product already in cart
    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Product already in cart
        // Implement update quantity or other actions as needed
        // For this example, let's assume we're incrementing quantity
        $row = mysqli_fetch_assoc($result);
        $qty = $row['quantity'] + 1;
        $sql = "UPDATE cart SET quantity = $qty WHERE cart_id = {$row['cart_id']}";
    } else {
        // Add new item to cart
        $sql = "INSERT INTO cart (user_id, product_id, quantity) 
                VALUES ($user_id, $product_id, 1)";
    }

    mysqli_query($conn, $sql);
}

// Retrieve cart items
$cart_items = [];
$wishlist_items = [];

// Assuming you have 'cart' and 'wishlist' tables
$cart_query = "SELECT cart.cart_id, cart.quantity, wrist_watch_products.title, wrist_watch_products.price_list, wrist_watch_products.price_mrp,wrist_watch_products.thumbnail_image
              FROM cart
              JOIN wrist_watch_products ON cart.product_id = wrist_watch_products.product_id
              WHERE user_id = {$_SESSION['user_id']}";

$wishlist_query = "SELECT wishlist.wishlist_id, wrist_watch_products.title,wrist_watch_products.thumbnail_image
                  FROM wishlist
                  JOIN wrist_watch_products ON wishlist.product_id = wrist_watch_products.product_id
                  WHERE user_id = {$_SESSION['user_id']}";

$cart_result = mysqli_query($conn, $cart_query);
$wishlist_result = mysqli_query($conn, $wishlist_query);

while ($item = mysqli_fetch_assoc($cart_result)) {
    $cart_items[] = $item;
}

while ($item = mysqli_fetch_assoc($wishlist_result)) {
    $wishlist_items[] = $item;
}

// Calculate cart totals
$cart_total = 0;
$mrp_total = 0;
foreach ($cart_items as $item) {
    $cart_total += $item['quantity'] * $item['price_list'];
    $mrp_total += $item['quantity'] * $item['price_mrp'];
}
$savings = $mrp_total - $cart_total;
?>

<!-- HTML -->

<!DOCTYPE html>
<html>
<head>
    <title>Cart and Wishlist</title>
    <!-- Add your CSS and other head elements here -->
<style>
body {
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
            background-color: #1877F2;
            color: white;
            overflow-x: hidden;
        }

        .cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .cart-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px;
            width: 400px;
            text-align: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-header {
            font-size: 24px;
            font-weight: 600;
            color: #F8BD00;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cart-item-details {
            flex-grow: 1;
            margin-left: 10px;
        }

        .item-title {
            font-size: 16px;
            font-weight: 600;
        }

        .item-price {
            font-size: 14px;
            color: #F8BD00;
        }

        .checkout-button {
            background-color: #F8BD00;
            color: #1877F2;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .checkout-button:hover {
            background-color: #e0a800;
        }    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="cart-container">
        <div class="cart-box">
            <div class="cart-header">Your Cart</div>

            <?php foreach ($cart_items as $item) { ?>
                <div class="cart-item">
                    <img src="<?php echo $item["thumbnail_image"]; ?>" alt="<?php echo $item["title"]; ?>">
                    <div class="cart-item-details">
                        <div class="item-title"><?php echo $item["title"]; ?></div>
                        <div class="item-price">$<?php echo $item["price_list"]; ?></div>
                        <div class="item-quantity">
                            <label for="quantity-<?php echo $item["cart_id"]; ?>">Quantity:</label>
                            <input type="range" id="quantity-<?php echo $item["cart_id"]; ?>" name="quantity" min="1" max="10" value="<?php echo $item["quantity"]; ?>">
                            <span class="quantity-value"><?php echo $item["quantity"]; ?></span>
                        </div>
                        <a href="remove_from_cart.php?cart_id=<?php echo $item["cart_id"]; ?>" class="remove-button">Remove</a>
                    </div>
                </div>
            <?php } ?>

            <div class="totals">
                <div class="total-price">Cart Total: $<?php echo $total_price; ?></div>
                <div class="total-mrp">MRP Total: ₹<?php echo $mrp_total; ?></div>
                <div class="savings">You Saved: ₹<?php echo $savings; ?> (<?php echo round(($savings / $mrp_total) * 100); ?>%)</div>
            </div>
            
            <a href="checkout.php" class="checkout-button">Checkout</a>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <script>
        const quantityInputs = document.querySelectorAll('input[name="quantity"]');
        quantityInputs.forEach(input => {
            const quantityValue = input.nextElementSibling;
            input.addEventListener('input', function () {
                const priceElement = this.closest('.cart-item').querySelector('.item-price');
                const price = parseFloat(priceElement.textContent.replace('$', ''));
                const newQuantity = this.value;
                quantityValue.textContent = newQuantity;
                priceElement.textContent = '$' + (price * newQuantity).toFixed(2);
            });
        });
    </script>
</body>
</html>
</html>
