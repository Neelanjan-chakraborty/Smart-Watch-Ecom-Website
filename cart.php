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

<!DOCTYPE html>
<html lang="en">
<head>
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
        .confirm-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px;
            width: 355px;
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
        .cart-item a
         {
            width: 60px;
            height: 60px;
            background-color: orangered;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;

        }
        .cart-item-details 
        {
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
            text-decoration: none;
        }
        #confirm-button {
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
        }  
        input[type="range" i] {
    appearance: auto;
    cursor: default;
    color: -internal-light-dark(rgb(16, 16, 16), rgb(255, 255, 255));
    padding: initial;
    border: initial;
    margin: 2px;
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

                    <button id="confirm-button">Confirm Changes</button>

                </div>
            <div class="totals">
                <div class="total-price">Cart Total: $<span id="cart-total">$<?php echo $item["price_list"]; ?></span></div>
                <div class="total-mrp">MRP Total: ₹<span id="mrp-total"><?php echo $mrp_total; ?></span></div>
                <div class="savings">You Saved: ₹<span id="savings"><?php echo $savings; ?></span> (<span id="savings-percentage"><?php echo round(($savings / $mrp_total) * 100); ?></span>%)</div>
            </div>
            
            <a href="checkout.php" class="checkout-button" >Checkout</a>
        <?php } else { ?>
            <p>Your cart is empty.</p>
        <?php } ?>
    </div>
</div>

</body>
    <?php include("footer.php"); ?>

<script>
    const quantityInputs = document.querySelectorAll('input[name="quantity"]');
    const cartTotalElement = document.getElementById('cart-total');
    const mrpTotalElement = document.getElementById('mrp-total');
    const savingsElement = document.getElementById('savings');
    const savingsPercentageElement = document.getElementById('savings-percentage');

    quantityInputs.forEach(input => {
        const quantityValue = input.nextElementSibling;
        const priceElement = input.closest('.cart-item').querySelector('.item-price');
        const initialPrice = parseFloat(priceElement.textContent.replace('$', ''));
        const cartTotal = parseFloat(cartTotalElement.textContent.replace('$', ''));
        const mrpTotal = parseFloat(mrpTotalElement.textContent.replace('₹', ''));

        input.addEventListener('input', function () {
            const newQuantity = parseInt(this.value);
            quantityValue.textContent = newQuantity;

            const newPrice = (initialPrice * newQuantity).toFixed(2);
            priceElement.textContent = '$' + newPrice;

            const priceDifference = parseFloat(newPrice) - (initialPrice * this.value);
            const newCartTotal = cartTotal + priceDifference;
            cartTotalElement.textContent = '$' + newCartTotal.toFixed(2);

            const savings = mrpTotal - newCartTotal;
            savingsElement.textContent = '$' + savings.toFixed(2);
            savingsPercentageElement.textContent = Math.round((savings / mrpTotal) * 100);
        });
    });
</script>
</html>