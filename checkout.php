<?php
session_start();
require_once "db_connection.php"; // Include your database connection

// Fetch cart details for the logged-in user
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$items = [];
$total_price = 0;
$mrp_total = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
        $total_price += $row["total_price"];
        $mrp_total += $row["total_mrp"];
    }

    // Insert order details into order_history table
    $order_date = date("Y-m-d H:i:s");
    foreach ($items as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $order_price = $item['total_price'];
        $insert_order_sql = "INSERT INTO order_history (user_id, product_id, quantity, total_price, order_date)
                            VALUES ('$user_id', '$product_id', '$quantity', '$order_price', '$order_date')";
        $conn->query($insert_order_sql);
    }

    // Delete cart items for the user after fetching the details
    $delete_sql = "DELETE FROM shopping_cart WHERE user_id = '$user_id'";
    $conn->query($delete_sql);
}


// Fetch user details from the database
$user_query = "SELECT * FROM users WHERE id = '$user_id'";
$user_result = $conn->query($user_query);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $user_email = $user_row["email"];
    $user_name = $user_row["first_name"];
}

// Prepare email content
$to = $user_email;
$subject = 'Order Details';
$headers = "From: neelanjanchakraborty231@gmail.com\r\n";
$headers .= "Reply-To: neelanjanchakraborty231@gmail.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <style>
         body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8bd00;
        }

        /* Container styles */
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            backdrop-filter: blur(10px);
        }

        /* Header styles */
        .header {
            color: #1877F2;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        /* Totals styles */
        .totals {
            margin-top: 10px;
        }

        .totals p {
            margin: 5px 0;
        }

        /* Footer styles */
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }

        /* Animated gradient background */
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Apply animated gradient background */
        body {
            background: linear-gradient(135deg, #00aaff, #f8bd00, #00ff00);
            background-size: 200% 200%;
            animation: gradientAnimation 10s ease infinite;
        }
    </style>
</head>
<body>
    <div style="background: linear-gradient(135deg, #00aaff, #f8bd00, #00ff00); padding: 20px;">
        <div class="email-container" style="max-width: 600px; margin: 0 auto; background: rgba(255, 255, 255, 0.9); border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px; backdrop-filter: blur(10px);">
            <h1 style="color: #1877F2;">Hello <?php echo $user_name; ?>,</h1>
            <p>Your Order Details:</p>
            <table style="width: 100%;">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($items as $item) : ?>
                <tr>
                <td><?php echo getProductTitle($conn, $item['product_id']); ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['total_price']; ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
            <p>Cart Total: ₹<?php echo $total_price; ?></p>
            <p>MRP Total: ₹<s><?php echo $mrp_total; ?></s></p>
            <p>You Saved: ₹<?php echo ($mrp_total - $total_price); ?> (<?php echo round((($mrp_total - $total_price) / $mrp_total) * 100); ?>%)</p>
            <p><strong>Your  Delivery Information:</strong></p>
            <p>Expected Delivery Date: August 31, 2023</p>
            <p> Delivery Address: 1234 Elm Street, Cityville</p>
            <p>Thank you for shopping with us!</p>
            <p>Regards!</p>
            <p>Watch Cart Team</p>

        </div>
    </div>
</body>
</html>
<?php
$content = ob_get_clean();

function getProductTitle($conn, $product_id) {
    $product_id = $conn->real_escape_string($product_id); // Sanitize input
    
    $query = "SELECT title FROM wrist_watch_products WHERE product_id = '$product_id'";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['title'];
    } else {
        return "Product Not Found"; // Return a default value if product is not found
    }
}

// Send the email
if (mail($to, $subject, $content, $headers)) {
    $email_status = 'Email has been sent.';
} else {
    $email_status = 'Email could not be sent.';
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
    <!-- Include your header section here -->
    <?php include("header.php"); ?>

    <div class="checkout-container">
        <h1>Order Summary</h1>
        <!-- Add more order details here, such as customer information, shipping address, etc. -->

        <div class="invoice">
            <!-- Generate invoice mockup here -->
            <h2>Invoice</h2>
            <table>
                <tr>
                    <th>Product-ID</th>
                    <th>Price (Each)</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?php echo $item["product_id"]; ?></td>
                    <td>₹<?php echo $item["price"]; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td>₹<?php echo $item["total_price"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <div class="order-summary-totals">
                <p>Cart Total: ₹<?php echo $total_price; ?></p>
                <p>MRP Total: ₹<s><?php echo $mrp_total; ?></s></p>
                <p>You Saved: ₹<?php echo ($mrp_total - $total_price); ?> (<?php echo round((($mrp_total - $total_price) / $mrp_total) * 100); ?>%)</p>
            </div>
        </div>

        <div class="order-placed">
            <h3>Order Placed Successfully!</h3>
            <p>Your order has been placed successfully. Thank you for shopping with us.</p>
            <p><a href="user.php">Click here</a> to view your orders and track your order history.</p>
        </div>
    </div>
<div class="back-button">
    <a href="cart.php">Back to Cart</a>
</div>
<?php include("footer.php"); ?>

<!-- Include your footer section here -->
</body>
</html>

