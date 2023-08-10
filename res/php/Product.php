<section class="recommended-products">
    <div class="container">
        <h2 class="section-title">Recommended Products</h2>
        <div class="row">
            <?php
            // Fetch and display recommended products from database
            require_once "db_connection.php";
            $sql = "SELECT DISTINCT category FROM wrist_watch_products";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                $category = $row['category'];

                // Display section for this category
                echo '<div class="col-md-4">
                    <div class="category-image">
                        <img src="res/thumbnails/Category/'.$category.'.png" alt="'.$category.'" class="full-width-image">
                    </div>
                    <div class="subsection">'
                        <?php
                        $sql = "SELECT * FROM wrist_watch_products WHERE category = '$category'";
                        $result2 = $conn->query($sql);

                        while($row2 = $result2->fetch_assoc()) {
                        ?>
                        <a href="products.php?product_id=' . $row2["product_id"] . '" class="product-card-link">
                            <div class="product-card">
                                <div class="thumbnail-container">
                                    <img src="' . $row2["thumbnail_image"] . '" alt="' . $row2["title"] . '">
                                </div>
                                <div class="product-details">
                                    <div class="product-title">
                                        <span class="product-title-text" style="color: yellow;">
                                            <?php echo $row2["title"]; ?>
                                        </span>
                                    </div>
                                    <div class="product-description">
                                        <span class="product-description-text" style="color: blue;">
                                            <?php echo $row2["materials"] . $row2["size_and_dimensions"]; ?>
                                        </span>
                                    </div>
                                    <ul class="product-info">
                                        <li><span class="info-icon" style="color: blue;">📺</span> Display: <?php echo $row2["display"]; ?></li>
                                        <li><span class="info-icon" style="color: blue;">🔋</span> Battery Life: <?php echo $row2["battery_life"]; ?></li>
                                        <li><span class="info-icon" style="color: blue;">📶</span> Connectivity: <?php echo $row2["connectivity"]; ?></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="price-text" style="color: yellow;">
                                            ₹<?php echo $discounted_price; ?>
                                        </span>
                                        <span class="original-price" style="color: blue;">
                                            <s>₹<?php echo $original_price; ?></s>
                                        </span>
                                        <span class="discount-percent" style="color: red;">
                                            <?php echo $discount_percent; ?>% OFF
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>
<style>
.recommended-products {
    background-color: yellow;
    padding: 20px 0;
}

.container {
    max-width: 960px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    width: 33.33%;
}

@media (max-width: 768px) {
    .row {
        flex-wrap: no-wrap;
    }

    .col-md-4 {
        width: 100%;
    }
}
</style>
<script>
$('.product-card').hover(function() {
    $(this).addClass('product-card-hover');
}, function() {
    $(this).removeClass('product-card-hover');
});
</script>

 Slideshow with Parallax Effect -->