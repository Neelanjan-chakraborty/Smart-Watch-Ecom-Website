<?php
session_start();
require_once "db_connection.php"; // Replace with your database connection code

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}
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
        mysqli_query($conn, $sql);
    } else {
        // Add new item to cart
        $sql = "INSERT INTO cart (user_id, product_id, quantity) 
                VALUES ($user_id, $product_id, 1)";
        mysqli_query($conn, $sql);
    }
} 
$user_id = $_SESSION["user_id"];

// Fetch cart details and items from the database
$cart_items = array();
$total_price = 0;
$mrp_total = 0;

$sql = "SELECT cart.cart_id, cart.product_id, cart.quantity, wrist_watch_products.title, wrist_watch_products.price_list, wrist_watch_products.price_mrp, wrist_watch_products.thumbnail_image FROM cart
        INNER JOIN wrist_watch_products ON cart.product_id = wrist_watch_products.product_id
        WHERE cart.user_id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total_price += ($row["price_list"] * $row["quantity"]);
        $mrp_total += ($row["price_mrp"] * $row["quantity"]);
    }
}


$savings = $mrp_total - $total_price;

?>
// Calculate total MRP and discount percentage
$discount_percentage = round(($savings / $mrp_total) * 100);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>


            body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #F8BD00; /* Yellow background */
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* White background for cards */
            overflow: hidden; /* Enable scrolling */
        }

        /* Center the back button and adjust spacing */
        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        /* Make the back button stand out */
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1877F2; /* Blue button */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

.order-details {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
}

.invoice {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
}

.order-placed {
    text-align: center;
    padding: 20px;
    background-color: #e6f7e9;
    border: 1px solid #c8e6c9;
    border-radius: 5px;
    color: #2e7d32;
}
.order-summary-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f5f5f5;
}

.order-summary-totals {
    margin-top: 20px;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

</style>

</head>
<body>
    <?php include("header.php"); ?>
    <div class="cart-container">
        <div class="cart-box">
            <div class="confirm-box">
                <div class="cart-header">Your Cart</div>
                <?php if (count($cart_items) > 0) { ?>
                    <?php foreach ($cart_items as $item) { ?>
                        <!-- Cart items here... -->
                    <?php } ?>

                    <button id="confirm-button">Confirm Changes</button>

                </div>
                <div class="totals" style="display:none;">
                    <!-- Total MRP and Discount display -->
                    <div class="total-mrp">Total MRP: ₹<span id="total-mrp"><?php echo $mrp_total; ?></span></div>
                    <div class="discount-percentage">Discount: <?php echo $discount_percentage; ?>%</div>
                </div>

                <div class="checkout-button-container" style="display: none;">
                    <a href="checkout.php" class="checkout-button" id="checkout-button">Checkout</a>
                </div>
            <?php } else { ?>
                <p>Your cart is empty.</p>
            <?php } ?>
        </div>
    </div>
    <?php include("footer.php"); ?>

    <script>

   confirmButton.addEventListener('click', function () {
            // ... Update total and savings ...

            // Calculate total MRP and discount percentage
            const totalMRPElement = document.getElementById('total-mrp');
            const discountPercentageElement = document.getElementById('discount-percentage');
            const newTotalMRP = calculateTotalMRP();
            const newDiscountPercentage = calculateDiscountPercentage(newTotalMRP, updatedCartTotal);

            totalMRPElement.textContent = '₹' + newTotalMRP.toFixed(2);
            discountPercentageElement.textContent = newDiscountPercentage + '%';

            // Show and enable Checkout button
            const checkoutButtonContainer = document.querySelector('.checkout-button-container');
            checkoutButtonContainer.style.display = 'block';
        });

        function calculateTotalMRP() {
            let totalMRP = 0;
            // Calculate total MRP based on cart items
            <?php foreach ($cart_items as $item) { ?>
                totalMRP += <?php echo $item["price_mrp"] * $item["quantity"]; ?>;
            <?php } ?>
            return totalMRP;
        }

        function calculateDiscountPercentage (totalMRP, cartTotal) {
            const savings = totalMRP - cartTotal;
            return Math.round ((savings / totalMRP) * 100);
        }

    </script>
</body>
</html>