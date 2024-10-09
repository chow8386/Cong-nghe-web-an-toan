<div class="main-content">
    <?php
        include 'ManageProduct.php';
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;

        $product = getProductDetail($product_id);
        if (!empty($product)) {
            echo "<div class='product-detail'>";
            echo "<div class='product-image'>";
            echo "<img src='uploads/products/" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
            echo "</div>";
            echo "<div class='product-info'>";
            echo "<h2>" . htmlspecialchars($product['name']) . "</h2>"; 
            echo "<p>Thông số: " . htmlspecialchars($product['description']) . "</p>";
            echo "<p>Giới thiệu: " . htmlspecialchars($product['intro']) . "</p>";
            echo "<p class='price'>Giá: " . number_format($product['price'], 0, ',', '.') . " $</p>"; 
            echo "<p>Còn: " . htmlspecialchars($product['stock']) . " sản phẩm</p>"; 
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Sản phẩm không tồn tại.</p>";
        }
    ?>
</div>
