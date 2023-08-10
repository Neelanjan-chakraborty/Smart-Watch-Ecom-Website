<?php
// Start session and check user authentication
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

// Include the database connection
require_once "db_connection.php";

// Get the user ID from the session (assuming you stored it during login)
$user_id = $_SESSION["user_id"];

// Fetch user details
$sql_user = "SELECT * FROM users WHERE id = $user_id";
$result_user = $conn->query($sql_user);
$user_data = $result_user->fetch_assoc();

// Fetch order history
$sql_orders = "SELECT * FROM order_history WHERE user_id = $user_id";
$result_orders = $conn->query($sql_orders);

$sql_order_details = "SELECT oh.*, wp.title, wp.thumbnail_image
                     FROM order_history oh
                     JOIN wrist_watch_products wp ON oh.product_id = wp.product_id
                     WHERE oh.user_id = $user_id";
$result_order_details = $conn->query($sql_order_details);

// Fetch wishlist items
$sql_wishlist = "SELECT * FROM wishlist WHERE user_id = $user_id";
$result_wishlist = $conn->query($sql_wishlist);

// Fetch product details for wishlist items
$wishlist_products = [];
while ($row = $result_wishlist->fetch_assoc()) {
    $product_id = $row['product_id'];
    $sql_product = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";
    $result_product = $conn->query($sql_product);
    $wishlist_products[$product_id] = $result_product->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Watch eCommerce</title>
    <link rel="stylesheet" href="res/css/user.css">
    <script>
        function toggleSection(sectionId) {
            var section = document.getElementById(sectionId);
            var sections = document.getElementsByClassName("profile-section");

            // Hide all sections
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = "none";
            }

            // Show the selected section
            section.style.display = "block";
        }
    </script>
</head>
<body>
        <?php include("header.php"); ?>
    <header>
        <h1>Welcome, <?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?>!</h1>
    </header>
    <nav>
        <div class="nav-container">
            <ul class="nav-list">
                <li class="nav-item" onclick="toggleSection('order-history');">Order History</li>
                <li class="nav-item" onclick="toggleSection('wishlist');">Wishlist</li>
                <li class="nav-item" onclick="toggleSection('reviews-comments');">Reviews and Comments</li>
            </ul>
        </div>
    </nav>
    <section id="order-history" class="profile-section" style="display: block;">
        <h2>Order History</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Product Name</th>                    
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>           </th>
                    <th>           </th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result_order_details->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['order_id'] . '</td>';
                    echo '<td>' . $row['order_date'] . '</td>';
                    echo '<td><img src="' . $row['thumbnail_image'] . '" alt="' . $row['title'] . '"></td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['total_price'] . '</td>';
                    echo '<td><a href="products.php?product_id=' . $row['product_id'] . '">View Product</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
    <section id="wishlist" class="profile-section" style="display: none;">
        <h2>Wishlist</h2>
        <ul>
            <?php
            foreach ($wishlist_products as $product) {
                echo '<li>';
                echo '<img src="' . $product['thumbnail_image'] . '" alt="' . $product['title'] . '">';
                echo '<h3>' . $product['title'] . '</h3>';
                echo '<p>Price: ' . $product['price_list'] . '</p>';
                echo '<a href="products.php?product_id=' . $product['product_id'] . '">View Product</a>';
                // Add "Add to Cart" button or link
                echo '</li>';
            }
            ?>
        </ul>
    </section>
    <section id="reviews-comments" class="profile-section" style="display: none;">
        <h2>Reviews and Comments</h2>
        <p>Leave a review or comment:</p>
        <!-- Implement a form for submitting reviews/comments -->
    </section>
        <?php include("footer.php"); ?>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
