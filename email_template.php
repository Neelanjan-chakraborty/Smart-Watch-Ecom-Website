<?php
// Get user's name from session data
$user_name = $_SESSION['first_name']; // Adjust this based on your session variable name

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
            background: linear-gradient(135deg, #00aaff, #f8bd00, #00ff00);
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            backdrop-filter: blur(10px);
        }

        /* Add more styles here as needed */
    </style>
</head>
<body>
    <div class="email-container">
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
                    <td><img src="<?php echo $item['thumbnail_url']; ?>" alt="Product Thumbnail" width="50"></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['total_price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Cart Total: ₹<?php echo $total_price; ?></p>
        <p>MRP Total: ₹<s><?php echo $mrp_total; ?></s></p>
        <p>You Saved: ₹<?php echo ($mrp_total - $total_price); ?> (<?php echo round((($mrp_total - $total_price) / $mrp_total) * 100); ?>%)</p>
        <p>Thank you for shopping with us!</p>
    </div>
</body>
</html>
<?php
$content = ob_get_clean();
echo $content;
?>
