
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css">
    <style>
.review-item {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    font-weight: bold;
}

.review-author {
    font-size: 14px;
    color: #333;
}

.review-date {
    font-size: 12px;
    color: #777;
}

.review-text {
    margin-bottom: 10px;
}

.star-ratings {
    color: #ffc107; /* Star color (yellow) */
    font-size: 16px;
}
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

.average-rating {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.average-rating p {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.average-rating ul {
    list-style: none;
    padding: 0;
}

.average-rating li {
    font-size: 14px;
    margin-bottom: 5px;
}
/* Review Form Styles */
#reviewForm {
    text-align: left;
}

.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-weight: bold;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 8px 12px;
}

/* Rating Input Styles (Assuming you're using radio buttons) */
.rating-label {
    margin-right: 10px;
}

/* Submit Button Styles */
.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    color: white;
    font-weight: bold;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-close {
    color: #6c757d;
}

    </style>
    <style>
    /* Style for the modal body */
    .modal-body {
        padding: 20px;
    }

    /* Style for the form labels */
    label {
        font-weight: bold;
    }

    /* Style for input fields */
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Style for form buttons */
    .modal-footer button {
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
    }
    
    /* Style for modal header */
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    /* Style for modal title */
    .modal-title {
        font-size: 20px;
    }

    /* Style for close button */
    .close {
        font-size: 24px;
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

<!-- Modal for Review Submission
<div class="modal" id="reviewModal"  data-bs-centered="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Add Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This feature is a work in progress.</p>
                <p>Please provide your review and ratings:</p>
                <form id="reviewForm">
                    <div class="form-group">
                        <label for="reviewText" class="form-label">Review Text</label>
                        <textarea id="reviewText" class="form-control" rows="4" placeholder="Your review text..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ratings</label><br>
                        <label class="rating-label">
                            <input type="radio" name="batteryRating" value="5"> 5 Stars
                        </label>
                        <label class="rating-label">
                            <input type="radio" name="batteryRating" value="4"> 4 Stars
                        </label>
                        -- Add similar radio buttons for other ratings --
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>
 -->
<!-- Popup -->


<div class="card mt-2">
    <h6>Ratings</h6>
    <!-- Calculate Average ratings and display them dynamically -->
    <div id="average-rating"></div>
    
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
                    echo '<h6 class="original-price" style="color: #ffc107;text-shadow: 0 0 4px black;font-size: xxx-large;">';
                    echo $discount_percent . '% OFF </h6>'; 
                    ?>
                    </div>
                    <button class="btn btn-primary" onclick="toggleCheckout()">Proceed to Checkout</button>

                    <div class="card checkout-card-cell" style="display: none;">
                        <div class="card-body">
                        <?php include("res/php/checkout_popup.php"); ?>
                       </div>
                   </div>
    <button class="btn btn-light wishlist" data-product-id="<?php echo $product['product_id']; ?>">
        <i class="fa fa-heart"></i> Add to Wishlist
    </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    const addReviewBtn = document.getElementById("add-review-btn");

document.addEventListener("DOMContentLoaded", function () {
    const reviewsContainer = document.getElementById("reviews-container");
    const addReviewBtn = document.getElementById("add-review-btn");
    const readMoreBtn = document.getElementById("read-more-btn");

    // Fetch and display reviews when the page loads
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('product_id');
    fetchReviews(productId);
    

    let displayedReviews = 3; // Number of reviews to initially display
    const reviewsToShow = 3;  // Number of additional reviews to show on each "Read More" click


    // Function to fetch and display reviews
   function fetchReviews(product_id) {
    fetch(`res/php/fetch_reviews.php?product_id=${product_id}`)
        .then(response => response.json())
        .then(data => {
            const averageRatingDiv = document.getElementById("average-rating");
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
                        <div class="star-ratings">
                            ${generateStarRating(review.rating)} <!-- Function to generate star icons -->
                        </div>
                    `;
                reviewsContainer.appendChild(reviewDiv);
                });

                // Calculate average ratings for different categories
            const averageRatings = calculateAverageRatings(data.ratings);
            displayAverageRatings(averageRatings, averageRatingDiv);
            });
    }

    // Fetch and display reviews when the page loads


    // Event listener for "Add Review" button
        addReviewBtn.addEventListener("click", function () {
        // Implement code to display the review submission form (modal or other UI)
        console.log("button pressed");
    });
    function generateStarRating(rating) {
    const maxRating = 5;
    const filledStars = '<i class="fas fa-star"></i>';
    const emptyStars = '<i class="far fa-star"></i>';
    const ratingHTML = [];

    for (let i = 1; i <= maxRating; i++) {
        if (i <= rating) {
            ratingHTML.push(filledStars);
        } else {
            ratingHTML.push(emptyStars);
        }
    }

    return ratingHTML.join('');
}
function calculateAverageRatings(ratings) {
    const averageRatings = {
        battery_life: 0,
        display_quality: 0,
        look_and_feel: 0,
        product_quality: 0,
        value_for_money: 0,
        ease_for_use: 0
    };
    
    const totalRatings = ratings.length;
    if (totalRatings === 0) {
        return averageRatings;
    }

    ratings.forEach(rating => {
        averageRatings.battery_life += rating.battery_life;
        averageRatings.display_quality += rating.display_quality;
        averageRatings.look_and_feel += rating.look_and_feel;
        averageRatings.product_quality += rating.product_quality;
        averageRatings.value_for_money += rating.value_for_money;
        averageRatings.ease_for_use += rating.ease_for_use;
    });

    for (const category in averageRatings) {
        averageRatings[category] /= totalRatings;
    }

    return averageRatings;
}

function displayAverageRatings(averageRatings, averageRatingDiv) {
    // Display average ratings content
    averageRatingDiv.innerHTML = `
        <div class="average-rating">
            <p>Average Ratings:</p>
            <ul>
                <li>Battery Life: ${averageRatings.battery_life.toFixed(1)}</li>
                <li>Display Quality: ${averageRatings.display_quality.toFixed(1)}</li>
                <li>Look and Feel: ${averageRatings.look_and_feel.toFixed(1)}</li>
                <li>Product Quality: ${averageRatings.product_quality.toFixed(1)}</li>
                <li>Value for Money: ${averageRatings.value_for_money.toFixed(1)}</li>
                <li>Ease for Use: ${averageRatings.ease_for_use.toFixed(1)}</li>
            </ul>
        </div>
    `;
}
});

</script>
<script>
    //document.addEventListener("DOMContentLoaded", function () {
       // const addReviewBtn = document.getElementById("add-review-btn");
       // const reviewModal = new bootstrap.Modal(document.getElementById("reviewModal"));
       // const reviewForm = document.getElementById("reviewForm");

        // Event listener for "Add Review" button
        //addReviewBtn.addEventListener("click", function () {
           // reviewModal.show();
        //});

        // Event listener for review form submission
        //reviewForm.addEventListener("submit", function (event) {
          //  event.preventDefault();

            // Simulate submission (work in progress)
            //console.log("Review form submitted (work in progress)");
            //setTimeout(function () {
               // reviewModal.hide();
           // }, 1000); // Hide the modal after a short delay (simulating submission)
        //});
    //});
</script>
<script>
$(document).ready(function() {
    $('.custom-checkout-popup-trigger').on('click', function() {
        var productId = $(this).data('product-id');
        fetchProductDetails(productId);
    });

    function fetchProductDetails(productId) {
        var productUrl = '/smartwatch/products.php?product_id=' + productId; // Remove baseUrl
        $.ajax({
            url: productUrl,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                populatePopup(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    function populatePopup(productData) {
        $('#productName').text(productData.title);
        $('#productThumbnail').attr('src', productData.thumbnail_image);

        var colorSelect = $('#color');
        colorSelect.empty();
        var colorOptions = productData.colour_options.split(',');
        $.each(colorOptions, function(index, color) {
            colorSelect.append($('<option>', {
                value: color,
                text: color
            }));
        });

        // Set the product ID in the hidden input field
        $('#productId').val(productData.product_id);

        $('#customCheckoutPopup').modal('show');
    }
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
function toggleCheckout() {
    console.log("Toggle function called"); // Log a message to check if the function is called
    
    var checkoutCard = document.querySelector('.checkout-card-cell');
    
    console.log("Checkout card style:", checkoutCard.style.display); // Log the current display style
    
    if (checkoutCard.style.display === 'none') {
        console.log("Display set to block"); // Log a message if changing to block
        checkoutCard.style.display = 'block';
    } else {
        console.log("Display set to none"); // Log a message if changing to none
        checkoutCard.style.display = 'none';
    }
}
</script>
<script>
$(document).ready(function() {
    $(".wishlist").click(function() {
        var productId = $(this).data("product-id");
        
        $.ajax({
            url: "res/php/add_to_wishlist.php", // Replace with the actual file name
            type: "POST",
            data: { product_id: productId },
            success: function(response) {
                alert("Product added to wishlist!");
            },
            error: function(xhr, status, error) {
                alert("An error occurred. Please try again.");
                console.error(error);
            }
        });
    });
});
</script>
</body>
</html>
