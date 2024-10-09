<div class="main-content">
    <?php
        include 'ManageProduct.php';
        include 'ManageCart.php';

        if (isset($_SESSION['userID'])) {
            $userId = $_SESSION['userID']; 
        }

        $product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

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

            echo "<form action='' method='POST'>";
            echo "<label for='quantity'>Số lượng:</label>";
            echo "<input type='number' name='quantity' min='1' max='" . htmlspecialchars($product['stock']) . "' value='1' required>";
            echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($product_id) . "'>";
            echo "<button type='submit' name='add_to_cart'>Thêm vào giỏ hàng</button>";
            echo "</form>";

            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Sản phẩm không tồn tại.</p>";
        }

        if (isset($_POST['add_to_cart'])) {
            if (!isset($_SESSION['userID'])) {
                header("Location: ?page=login"); 
                exit;
            }

            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
            $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;

            if (!empty($product) && $product_id == $product['product_id']) {
                $stock_available = $product['stock']; 

                if ($quantity > 0 && $quantity <= $stock_available) {
                    addToCart($userId, $product_id, $quantity);
                    echo "<p>Sản phẩm đã được thêm vào giỏ hàng!</p>";
                } else {
                    echo "<p>Số lượng yêu cầu lớn hơn số sản phẩm còn lại trong kho.</p>";
                }
            } else {
                echo "<p>Sản phẩm không hợp lệ hoặc không còn tồn tại.</p>";
            }
        }

        
    ?>
</div>
