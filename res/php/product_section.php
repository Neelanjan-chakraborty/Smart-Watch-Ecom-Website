    <section class="recommended-products">
        <?php
        // Fetch and display recommended products from database
        require_once "db_connection.php";
$sql = "SELECT DISTINCT category FROM wrist_watch_products";
$result = $conn->query($sql); 

while($row = $result->fetch_assoc()) {
  $category = $row['category'];
  $imageFileName = $category . '.png';
$imageSrc = 'res/thumbnails/Category/' . $imageFileName;
  // Display section for this category
echo '<img src="' . $imageSrc . '" alt="' . $category . '" class="full-width-image">';
echo '<div class="subsection">';
  $sql = "SELECT * FROM wrist_watch_products WHERE category = '$category'";
  $result2 = $conn->query($sql);
  while($row2 = $result2->fetch_assoc()) {
echo '<a href="products.php?product_id=' . $row2["product_id"] . '" class="product-card-link">';
echo '<div class="product-card">';
echo '<div class="thumbnail-container">';
echo '<img src="' . $row2["thumbnail_image"] . '" alt="' . $row2["title"] . '">';
echo '<div class="product-details">';
echo '<div class="product-title">' . $row2["title"] . '</div>';
echo '<div class="product-description"><span class="product-description-text" style="color: white;">' . $row2["materials"] . $row2["size_and_dimensions"] . '</span></div>';
echo '<ul class="product-info">';
echo '<li><span class="info-icon">📺</span> Display: ' . $row2["display"] . '</li>';
echo '<li><span class="info-icon">🔋</span> Battery Life: ' . $row2["battery_life"] . '</li>';
echo '<li><span class="info-icon">📶</span> Connectivity: ' . $row2["connectivity"] . '</li>';
echo '</ul>';
$original_price = $row2["price_mrp"];
$discounted_price = $row2["price_list"];
$discount_percent = round((($original_price - $discounted_price) / $original_price) * 100);
echo '<div class="product-price">';
echo '<span class="price-text" style="color: yellow;">';
echo '₹ ' . $discounted_price . '</span>';
echo '<span class="original-price" style="color: red;">';
echo ' ₹<s>' . $original_price. '</s></span>  ';
echo '<span class="original-price" style="color: grey;">';
echo $discount_percent . '% OFF </span>'; 
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</a>';
    }                echo '</div>';

         }

        $conn->close();
        ?>

    </section>
    <style type="res/css/styles2.css"></style>

<style>
.product-info li {
  display: inline-block;
  margin-right: 10px;
}

.product-info span {
  color: #ffffff;
  font-size: 12px;
}
.product-info {
    font-style: normal;
    margin-top: 10px;
    font-size: 14px;
    color: #ffffff;
    text-indent: initial;
    display: flex;
    align-content: center;
    justify-content: center;
    flex-direction: row;
    flex-wrap: nowrap;
    font-weight: 600;
    padding: 15px;
}
.product-price {
    margin-top: 10px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-wrap: wrap;
    flex-direction: column;
}

.off-price{
    color: grey;
    font-size: larger;
    font-weight: bolder;
}
.product-price{
  font-size: 18px;
  font-weight: 600;
  color: #0D6EFD;
  margin-bottom: 10px;
}
.price-text {
  font-size: 18px;
  font-weight: bold;
}

.original-price {
  text-decoration: line-through;
  font-size: 14px;
  font-weight: normal;
}
</style>
<script>
$('.product-card').hover(function() {
    $(this).addClass('product-card-hover');
}, function() {
    $(this).removeClass('product-card-hover');
});
</script
