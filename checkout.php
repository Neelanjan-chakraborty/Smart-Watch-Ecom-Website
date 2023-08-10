<?php
session_start();
require_once "db_connection.php"; // Include your database connection

// Fetch cart details for the logged-in user
$user_id = $_SESSION["user_id"];
$sql = "SELECT c.*, p.title, p.price_list,p.price_mrp FROM cart c
        INNER JOIN wrist_watch_products p ON c.product_id = p.product_id
        WHERE c.user_id = '$user_id'";
$result = $conn->query($sql);

$items = [];
$total_price = 0;
$mrp_total = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
        $total_price += $row["quantity"] * $row["price_list"];
        $mrp_total += $row["quantity"] * $row["price_mrp"];
    }
    
    // Insert order details into order_history table
    $order_date = date("Y-m-d H:i:s");
    $insert_order_sql = "INSERT INTO order_history (user_id, product_id, quantity, total_price, order_date)
                        VALUES ('$user_id', '{$items[0]['product_id']}', '{$items[0]['quantity']}', '$total_price', '$order_date')";
    $conn->query($insert_order_sql);

    // Delete cart items for the user after fetching the details
    $delete_sql = "DELETE FROM cart WHERE user_id = '$user_id'";
    $conn->query($delete_sql);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
/* Add your CSS styles here to format the checkout page */
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
    <div class="checkout-container">
        <h1>Order Summary</h1>
        
        <div class="order-details">
            <p>Order Number: <?php echo $randomOrderNumber; ?></p>
            <!-- Add more order details here, such as customer information, shipping address, etc. -->
        </div>
        
        <div class="invoice">
            <!-- Generate invoice mockup here -->
            <h2>Invoice</h2>
            <table>
            <tr>
                <th>Product</th>
                <th>Price (Each)</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item["title"]; ?></td>
                <td>₹<?php echo $item["price_list"]; ?></td>
                <td><?php echo $item["quantity"]; ?></td>
                <td>₹<?php echo ($item["price_list"] * $item["quantity"]); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="order-summary-totals">
            <p>Cart Total: ₹<?php echo $total_price; ?></p>
            <p>MRP Total: ₹<s><?php echo $mrp_total; ?></s></p>
            <p>You Saved: ₹<?php echo ($mrp_total - $total_price); ?> (<?php echo round((($mrp_total - $total_price) / $mrp_total) * 100); ?>%)</p>
        </div>        </div>
        
        <div class="order-placed">
            <h3>Order Placed Successfully!</h3>
            <p>Your order has been placed successfully. Thank you for shopping with us.</p>
            <!-- You can also include a link to track the order or view order history -->
        </div>
    </div>

        <div class="back-button">
            <a href="cart.php">Back to Cart</a>
        </div>
        <?php include("footer.php"); ?>

</body>
</html>
