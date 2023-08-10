<?php
session_start();
require_once "db_connection.php";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

$product_id = $_GET['product_id'];

// Fetch reviews with user names
$queryReviews = "SELECT r.review_id, r.user_id, u.first_name, u.last_name, r.review_text, r.upload_image, r.timestamp FROM product_reviews AS r
                JOIN users AS u ON r.user_id = u.id
                WHERE r.product_id = ?";
$stmtReviews = $conn->prepare($queryReviews);
$stmtReviews->bind_param('i', $product_id);
$stmtReviews->execute();
$reviews = $stmtReviews->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch ratings
$queryRatings = "SELECT rating_id, user_id, battery_life, display_quality, look_and_feel, product_quality, value_for_money, ease_for_use, timestamp FROM product_ratings WHERE product_id = ?";
$stmtRatings = $conn->prepare($queryRatings);
$stmtRatings->bind_param('i', $product_id);
$stmtRatings->execute();
$ratings = $stmtRatings->get_result()->fetch_all(MYSQLI_ASSOC);

// Combine reviews and ratings
$data = array(
    "reviews" => $reviews,
    "ratings" => $ratings
);

header("Content-Type: application/json");
echo json_encode($data);
?>
