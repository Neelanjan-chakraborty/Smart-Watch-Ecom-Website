<?php
session_start();
require_once "db_connection.php"; // Replace with your database connection code

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

$product_id = $_GET["product_id"];

// Fetch product details from the database
$sql = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your meta tags and stylesheets here -->
    <link rel="stylesheet" href="res/css/styles.css">
    <!-- Add any additional styles or external CSS files if needed -->
</head>
<body>
    <?php include("header.php"); ?>

    <div class="product-container">
        <div class="product-box">
            <div class="product-header">
                <img src="<?php echo $product["thumbnail_image"]; ?>" alt="<?php echo $product["title"]; ?>">
                <h1><?php echo $product["title"]; ?></h1>
            </div>

            <div class="product-details">
                <div class="product-row">
                    <div class="product-col">
                        <h2>Product Description</h2>
                        <p><?php echo $product["description"]; ?></p>
                    </div>
                </div>

                <div class="product-row">
                    <div class="product-col">
                        <h2>Specifications</h2>
                        <ul>
                            <li><strong>Category:</strong> <?php echo $product["category"]; ?></li>
                            <li><strong>Price:</strong> $<?php echo $product["price_list"]; ?></li>
                            <!-- Add other specifications -->
                        </ul>
                    </div>
                    <div class="product-col">
                        <h2>Features</h2>
                        <ul>
                            <li><strong>Color Options:</strong> <?php echo $product["colour_options"]; ?></li>
                            <!-- Add other features -->
                        </ul>
                    </div>
                </div>

                <div class="product-row">
                    <div class="product-col">
                        <h2>Customer Reviews</h2>
                        <div class="product-reviews">
                            <?php echo $product["customer_reviews"]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="recommended-products">
        <h2>Recommended Products</h2>
        <div class="recommendation-cards">
            <?php
            $recommendationSql = "SELECT * FROM wrist_watch_products WHERE product_id != $product_id LIMIT 3";
            $recommendationResult = $conn->query($recommendationSql);

            if ($recommendationResult->num_rows > 0) {
                while ($recommendation = $recommendationResult->fetch_assoc()) {
                    echo '<div class="product-card recommendation-card">';
                    echo '<a href="product.php?product_id=' . $recommendation["product_id"] . '">';
                    echo '<div class="thumbnail-container">';
                    echo '<img src="' . $recommendation["thumbnail_image"] . '" alt="' . $recommendation["title"] . '">';
                    echo '</div>';
                    echo '<h3>' . $recommendation["title"] . '</h3>';
                    echo '<p>' . $recommendation["short_description"] . '</p>';
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

    <div class="product-actions">
        <a href="add_to_cart.php?product_id=<?php echo $product_id; ?>" class="add-to-cart-button">Add to Cart</a>
        <a href="https://www.amazon.com/dp/B099794941" target="_blank" class="buy-now-button">Buy Now</a>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
