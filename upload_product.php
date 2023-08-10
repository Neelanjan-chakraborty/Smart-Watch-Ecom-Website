<?php
// Include your database connection code here
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price_mrp = $_POST['price_mrp'];
    $price_list = $_POST['price_list'];
    $thumbnail_image = $_POST['thumbnail'];
    $product_images = $_POST['images'];
    $reviews = $_POST['reviews'];
    $ratings = $_POST['ratings'];
    $colour_options = $_POST['variants'];
    $materials = $_POST['materials'];
    $display = $_POST['display'];
    $connectivity = $_POST['connectivity'];
    $battery_life = $_POST['battery_life'];
    $health_features = $_POST['health_fitness'];
    $water_resistance = $_POST['water_resistance'];
    $compatibility = $_POST['compatibility'];
    $additional_features = $_POST['additional_features'];
    $warranty_return = $_POST['warranty_return'];
    $return_policy = $_POST['return_policy'];
    $customer_reviews = $_POST['customer_reviews'];
    $size_and_dimensions = $_POST['size_dimensions'];
    $packaging = $_POST['packaging'];
    $shipping_delivery = $_POST['shipping_delivery'];

    // Prepare the SQL query
    $query = "INSERT INTO wrist_watch_products (title, description, category, price_mrp, price_list, thumbnail_image, product_images, reviews, ratings, colour_options, materials, display, connectivity, battery_life, health_features, water_resistance, compatibility, additional_features, warranty, return_policy, customer_reviews, size_and_dimensions, packaging, shipping_delivery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssiisssssssssssssss", $title, $description, $category, $price_mrp, $price_list, $thumbnail_image, $product_images, $reviews, $ratings, $colour_options, $materials, $display, $connectivity, $battery_life, $health_features, $water_resistance, $compatibility, $additional_features, $warranty_return, $return_policy, $customer_reviews, $size_and_dimensions, $packaging, $shipping_delivery);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product uploaded successfully!";
    } else {
        echo "Error uploading product: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
