<?php
session_start();
require_once "db_connection.php"; // Include your database connection code

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract review data from POST request
    $reviewText = $_POST["review_text"];
    $batteryRating = $_POST["battery_rating"];
    // ... Extract other ratings ...

    $userId = $_SESSION["user_id"]; // Assuming you have the user's ID stored in session

    // Insert review and ratings into the database
    $queryInsertReview = "INSERT INTO product_reviews (product_id, user_id, review_text, timestamp)
                          VALUES (?, ?, ?, NOW())";
    $stmtInsertReview = $conn->prepare($queryInsertReview);
    $stmtInsertReview->bind_param("iis", $productId, $userId, $reviewText);
    
    // Execute the query and handle success/error
    if ($stmtInsertReview->execute()) {
        $reviewId = $stmtInsertReview->insert_id;

        // Insert ratings into the database
        $queryInsertRatings = "INSERT INTO product_ratings (product_id, review_id, user_id, battery_life, ...)
                               VALUES (?, ?, ?, ?, ...)";
        $stmtInsertRatings = $conn->prepare($queryInsertRatings);
        $stmtInsertRatings->bind_param("iiid...", $productId, $reviewId, $userId, $batteryRating, ...);

        if ($stmtInsertRatings->execute()) {
            // Ratings inserted successfully
            $response = array("status" => "success");
            echo json_encode($response);
        } else {
            // Error inserting ratings
            $response = array("status" => "error", "message" => "Error inserting ratings");
            echo json_encode($response);
        }
    } else {
        // Error inserting review
        $response = array("status" => "error", "message" => "Error inserting review");
        echo json_encode($response);
    }

    // Close connections and statements
    $stmtInsertReview->close();
    $stmtInsertRatings->close();
    $conn->close();
}
?>
