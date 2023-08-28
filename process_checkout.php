<?php
session_start();
require_once "db_connection.php"; // Replace with your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST["quantity"];
    $color=$_POST["color"];
    $shippingAddress = $_POST["shippingAddress"];
    $product_id = $_POST["product_id"];

    // Validate form inputs
    if (empty($quantity) || empty($shippingAddress)) {
        // Handle validation errors
        // Redirect back to the checkout page with an error message
        header("Location: checkout.php?product_id=$product_id&error=fields");
        exit;
    }

    // Fetch product details from the database
    $sql = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Calculate total price and money saved
        $totalListPrice = $quantity * $product['price_list'];
        $totalMRPPrice = $quantity * $product['price_mrp'];
        $moneySaved = $totalMRPPrice - $totalListPrice;

        // Insert the checkout details into the shopping cart table
        $user_id = $_SESSION["user_id"]; // You should get the logged-in user's ID here
        $price = $product['price_list'];
        $total_price = $totalListPrice;
        $total_mrp = $totalMRPPrice;

        $insert_sql = "INSERT INTO shopping_cart (user_id, product_id, quantity, price, total_price, total_mrp, money_saved, location, color, created_date)
                       VALUES ($user_id, $product_id, $quantity, $price, $total_price, $total_mrp, $moneySaved, '$shippingAddress','$color', NOW())";

        if ($conn->query($insert_sql) === TRUE) {
            // Redirect to a confirmation page
            header("Location: cart.php?product_id=$product_id&quantity=$quantity&color=$color&totalListPrice=$totalListPrice&totalMRPPrice=$totalMRPPrice&moneySaved=$moneySaved");
            exit;
        } else {
            // Handle database insertion error
            header("Location: checkout.php?error=db");
            exit;
        }
    } else {
        // Product not found, handle error
        header("Location: checkout.php?error=product");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Your Shopping Cart</h1>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Color</th>
                            <th>Total Price</th>
                            <th>MRP Price</th>
                            <th>Money Saved</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through cart items and display them -->
                        <?php
                        // Loop through cart items fetched from the database
                        foreach ($cartItems as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['product_title'] . '</td>';
                            echo '<td>' . $item['color'] . '</td>';
                            echo '<td>$' . $item['total_price'] . '</td>';
                            echo '<td>$' . $item['total_mrp'] . '</td>';
                            echo '<td>$' . $item['money_saved'] . '</td>';
                            echo '<td>';
                            echo '<button class="btn btn-sm btn-danger">Remove</button>';
                            echo '<button class="btn btn-sm btn-secondary ml-2">Save for Later</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
