<div class="card checkout-card" style="display: block;">
    <div class="card-body">
        <?php
        // Fetch product details from the database based on the product_id
        $sql = "SELECT * FROM wrist_watch_products WHERE product_id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        ?>
        <div class="product-card">
            <div class="thumbnail-image">
                <img src="<?php echo $product['thumbnail_image']; ?>" alt="Thumbnail" width="150">
            </div>
            <div class="product-details">
                <h6>Product Title: <?php echo $product['title']; ?></h6>
                <p>Return Policy: <?php echo $product['return_policy']; ?></p>
                <p>Pricing: <?php echo $product['price_list']; ?></p>
            </div>
        </div>

        <!-- Checkout form -->
        <form action="process_checkout.php" method="post">

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>
            <div class="form-group">
                <label for="color">Colour:</label>
                <select class="form-control" name="color">
                    <?php
                    $colorOptions = explode(",", $product['colour_options']);
                    foreach ($colorOptions as $colorOption) {
                        echo '<option value="' . $colorOption . '">' . $colorOption . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="shippingAddress">Shipping Address:</label>
                <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3" required></textarea>
            </div>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="toggleCheckout()">Close</button>
                <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
            </div>
        </form>
        <?php } else { ?>
        <p>Product not found.</p>
        <?php } ?>
    </div>
</div>
<style>
/* Styling for the checkout card */
.checkout-card {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
}

.checkout-card .product-card {
    display: flex;
    margin-bottom: 20px;
}

.checkout-card .thumbnail-image {
    flex: 1;
    text-align: center;
}

.checkout-card .thumbnail-image img {
    max-width: 100%;
    height: auto;
    display: inline-block;
    margin-bottom: 10px;
}

.checkout-card .product-details {
    flex: 2;
    padding-left: 20px;
}

.checkout-card .form-group {
    margin-bottom: 15px;
}

.checkout-card .btn-group {
    margin-top: 15px;
}

.checkout-card .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.checkout-card .btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

/* Additional styles to match your design */
</style>
