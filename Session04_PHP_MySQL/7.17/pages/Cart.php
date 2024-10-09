<div class="main-content">
    <?php
        include 'ManageCart.php';
        include 'libs/db_conn.php';

        if (!isset($_SESSION['userID'])) {
            header("Location: login.php"); 
            exit;
        }

        $userId = $_SESSION['userID']; 

        if (isset($_POST['remove_from_cart'])) {
            $product_id_to_remove = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;

            if ($product_id_to_remove > 0) {
                if (removeFromCart($userId, $product_id_to_remove, $conn)) {
                    echo "<p>Sản phẩm đã được xóa khỏi giỏ hàng!</p>";
                }
            }
        }

        $sql_cart_items = "SELECT sc.quantity, p.product_id, p.name, p.price, p.image_url 
                           FROM shoppingcart sc 
                           JOIN products p ON sc.product_id = p.product_id 
                           WHERE sc.user_id = $userId";
        $result_cart = $conn->query($sql_cart_items);

        if ($result_cart && $result_cart->num_rows > 0) {
            echo "<h2>GIỎ HÀNG</h2>";
            echo "<table class='product-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Hình ảnh</th>";
            echo "<th>Tên sản phẩm</th>";
            echo "<th>Số lượng</th>";
            echo "<th>Giá</th>";
            echo "<th>Tổng</th>";
            echo "<th>Hành động</th>"; 
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $totalPrice = 0; 

            while ($row = $result_cart->fetch_assoc()) {
                $subtotal = $row['quantity'] * $row['price']; 
                $totalPrice += $subtotal; 

                echo "<tr>";
                echo "<td>
                    <a href='?page=productDetail&product_id=" . htmlspecialchars($row['product_id']) . "'>
                        <img src='" . "uploads/products/" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width:100px;'>
                    </a>
                    </td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>"; 
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . number_format($row['price'], 0, ',', '.') . " $</td>"; 
                echo "<td>" . number_format($subtotal, 0, ',', '.') . " $</td>"; 
                
                echo "<td>
                    <form action='' method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['product_id']) . "'>
                        <button type='submit' name='remove_from_cart' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?\");'>Xóa</button>
                    </form>
                </td>";
                echo "</tr>"; 
            }

            echo "<tr>";
            echo "<td colspan='5' style='text-align:right;'><strong>Tổng tiền:</strong></td>";
            echo "<td><strong>" . number_format($totalPrice, 0, ',', '.') . " $</strong></td>";
            echo "</tr>"; 

            echo "</tbody>";
            echo "</table>"; 
        } else {
            echo "<p>Giỏ hàng của bạn trống.</p>";
        }

        include 'libs/db_close.php';
    ?>
</div>
