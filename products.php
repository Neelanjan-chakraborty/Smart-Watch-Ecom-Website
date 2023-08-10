<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Product Description Page</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
        <link rel="stylesheet" href="res/css/product.css">
        <link rel="stylesheet" href="res/css/colours.css">

    <style>

.sketchfab-embed-wrapper {
    position: relative;
    padding-bottom: 130.25%;
    height: 27px;
    overflow: hidden;
    border-radius: 15px;
    margin-top: 24px;
}
.sketchfab-embed-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 15px;
}
#toggleViewButton {
    background-color: #00dcff75;
    color: #000107;
    border: none;
    border-radius: 12px;
    padding: 10px 15px;
    margin-top: 10px;
    cursor: pointer;
    border-color: #7fffd4b5;
}
    </style>
</head>
<body oncontextmenu='return false' class='snippet-body'>
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

    <?php include("header.php"); ?>
    
    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <!-- Image Carousel and Reviews Section -->
<div class="card">
    <div class="demo">
        <ul id="lightSlider">
            <!-- Loop through product images -->
            <?php
            $images = explode(",", $product["thumbnail_image"]);
            foreach ($images as $image) {
                echo '<li data-thumb="' . $image . '"><img src="' . $image . '"></li>';
            }
            ?>
        </ul>
    </div>
    <button id="toggleViewButton">3D View</button>
    <div class="sketchfab-embed-wrapper" id="sketchfabContainer" style="display: none;">
        <iframe
            title="smartwatch"
            frameborder="0"
            allowfullscreen mozallowfullscreen="true"
            webkitallowfullscreen="true"
            allow="autoplay; fullscreen; xr-spatial-tracking"
            xr-spatial-tracking
            execution-while-out-of-viewport
            execution-while-not-rendered
            web-share
            src="https://sketchfab.com/models/e5ac6928e8aa47b89f4968cfee94b5a1/embed?autospin=1&autostart=1&ui_hint=0&dnt=1">
        </iframe>
    </div>
</div>

 <div class="card mt-2">
    <h6>Reviews</h6>
    <!-- Loop through reviews and display them dynamically -->
    <div id="reviews-container">
        <!-- Reviews will be dynamically added here -->
    </div>
    <button id="add-review-btn" class="btn btn-primary mt-2">Add Review</button>
</div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <!-- Product Details -->
                    <div class="d-flex flex-row align-items-center p-ratings">
                        <!-- Display star ratings -->
                        <?php
                        $rating = $product["ratings"]; // Use actual product ratings from the database
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<i class="fa fa-star"></i>';
                            } else {
                                echo '<i class="fa fa-star-o"></i>';
                            }
                        }
                        
                        $original_price = $product["price_mrp"];
                        $discounted_price = $product["price_list"];
                        $discount_percent = round((($original_price - $discounted_price) / $original_price) * 100);
                        ?>
                        <span class="ml-1"><?php echo $product["ratings"]; ?></span>
                    </div>
                    <div class="about">
                        <h2 class="font-weight-bold"><?php echo $product["title"]; ?></h2>
                        <h4 class="font-weight-bold" > ₹ <?php echo $product["price_list"]; ?></h4>
                     <?php
                    echo '<h5 class="original-price" style="color: red;">';
                    echo ' ₹<s>' . $original_price. '</s></h5>  ';
                    echo '<h6 class="original-price" style="
    color: #ffc107;
    text-shadow: 0 0 4px black;
    font-size: xxx-large;">';
                    echo $discount_percent . '% OFF </h6>'; 
?>
                    </div>
                    <div class="buttons">
                        <a href="cart.php?product_id=<?php echo $product_id; ?>" class="btn btn-outline-warning btn-long cart">Add to Cart</a>
                        <button class="btn btn-light wishlist"><i class="fa fa-heart"></i></button>
                    </div>
                    <hr>
                    <div class="product-description">
                        <!-- Display product details -->
                        <div><span class="font-weight-bold">Color:</span><span><?php echo $product["colour_options"]; ?></span></div>
                        <!-- Add radio buttons for color options -->
                        <div class="my-color">
                            <?php
                            $colorOptions = explode(",", $product["colour_options"]);
                            foreach ($colorOptions as $colorOption) {
                                echo '<label class="radio">';
                                echo '<input type="radio" name="color" value="' . $colorOption . '">';
                                echo '<span class="' . strtolower($colorOption) . '"></span>';
                                echo '</label>';
                            }
                            ?>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <i class="fa fa-calendar-check-o"></i>
                            <span class="ml-1">Delivery from <?php echo $product["shipping_delivery"]; ?></span>
                        </div>
                        <div class="mt-2">
                            <span class="font-weight-bold">Description</span>
                            <div class="product-description">
                                    <p class="collapsed">
                                        <?php echo $product["description"]; ?>
                                    </p>
                                <button class="read-more-button">Read More</button>
                            </div>

                        </div>
                        <div class="card mt-2">
    <div class="card-header">
        <h6>Specifications</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Materials</th>
                    <td><?php echo $product["materials"]; ?></td>
                </tr>
                <tr>
                    <th>Display</th>
                    <td><?php echo $product["display"]; ?></td>
                </tr>
                <tr>
                    <th>Connectivity</th>
                    <td><?php echo $product["connectivity"]; ?></td>
                </tr>
                <tr>
                    <th>Battery Life</th>
                    <td><?php echo $product["battery_life"]; ?></td>
                </tr>
                <tr>
                    <th>Health Features</th>
                    <td><?php echo $product["health_features"]; ?></td>
                </tr>
                <tr>
                    <th>Water Resistance</th>
                    <td><?php echo $product["water_resistance"]; ?></td>
                </tr>
                <tr>
                    <th>Compatibility</th>
                    <td><?php echo $product["compatibility"]; ?></td>
                </tr>
                <tr>
                    <th>Additional Features</th>
                    <td><?php echo $product["additional_features"]; ?></td>
                </tr>
                <tr>
                    <th>Size and Dimensions</th>
                    <td><?php echo $product["size_and_dimensions"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                    </div>
                </div>
                <div class="card mt-2">
                    <span>Similar items:</span>
                    <div class="similar-products mt-2 d-flex flex-row">
    <?php
    // Fetch and display similar products
    $similarProductsSql = "SELECT * FROM wrist_watch_products WHERE product_id != $product_id LIMIT 5";
    $similarProductsResult = $conn->query($similarProductsSql);
    while ($similarProduct = $similarProductsResult->fetch_assoc()) {
        echo '<div class="card border p-1" style="width: 9rem;margin-right: 3px;">';
        echo '<a href="products.php?product_id=' . $similarProduct["product_id"] . '">'; // Add link to product page
        echo '<img src="' . $similarProduct["thumbnail_image"] . '" class="card-img-top" alt="'.$similarProduct["title"].'">';;
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h6 class="card-title" style="color: black;">' . $similarProduct["title"] . '</h6>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
                </div>
            </div>
        </div>
    </div>
        <?php include("footer.php"); ?>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script>
        // Your JavaScript code here
    </script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='res/js/readmore.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    const toggleViewButton = document.getElementById('toggleViewButton');
    const sketchfabContainer = document.getElementById('sketchfabContainer');
    const lightSliderContainer = document.querySelector('.demo');


    toggleViewButton.addEventListener('click', () => {
        if (sketchfabContainer.style.display === 'none') {
            lightSliderContainer.style.display = 'none';
            sketchfabContainer.style.display = 'block';
            toggleViewButton.textContent = 'Image View';
        } else {
            lightSliderContainer.style.display = 'block';
            sketchfabContainer.style.display = 'none';
            toggleViewButton.textContent = '3D View';
        }
    });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const reviewsContainer = document.getElementById("reviews-container");
    const addReviewBtn = document.getElementById("add-review-btn");
    const readMoreBtn = document.getElementById("read-more-btn");

    let displayedReviews = 3; // Number of reviews to initially display
    const reviewsToShow = 3;  // Number of additional reviews to show on each "Read More" click

    // Function to fetch and display reviews
    function fetchReviews(product_id) {
        fetch(`res/php/fetch_reviews.php?product_id=${product_id}`)
            .then(response => response.json())
            .then(data => {
                reviewsContainer.innerHTML = '';

                // Display limited number of reviews
                data.reviews.slice(0, displayedReviews).forEach(review => {
                    const reviewDiv = document.createElement("div");
                    reviewDiv.className = "review-item";
                    reviewDiv.innerHTML = `
                        <div class="review-header">
                            <div class="review-author">${review.first_name} ${review.last_name}</div>
                            <div class="review-date">${review.timestamp}</div>
                        </div>
                        <div class="review-text">${review.review_text}</div>
                        <div class="review-ratings">
                            Ratings: Battery ${ratings.battery_life}, Display ${ratings.display_quality}, Look ${ratings.look_and_feel},
                            Product ${ratings.product_quality}, Value ${ratings.value_for_money}, Ease ${ratings.ease_for_use}
                        </div>
                    `;
                    reviewsContainer.appendChild(reviewDiv);
                });

                // Check if there are more reviews to show
                if (displayedReviews < data.reviews.length) {
                    readMoreBtn.style.display = "block";
                } else {
                    readMoreBtn.style.display = "none";
                }
            });
    }

    // Fetch and display reviews when the page loads
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('product_id');
    fetchReviews(productId);

    // Event listener for "Read More" button
    readMoreBtn.addEventListener("click", function () {
        displayedReviews += reviewsToShow;
        fetchReviews(productId);
    });

    // Event listener for "Add Review" button
    addReviewBtn.addEventListener("click", function () {
        // Implement code to display the review submission form (modal or other UI)
        console.log("button pressed");
    });
});


</script>
</body>
</html>
