<?php
    function getProductsByCategory($category_id) 
    {
        include 'libs/db_conn.php'; 

        $products = []; 
        $sql = "SELECT * FROM products WHERE category_id = $category_id"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row; 
            }
        }

        include 'libs/db_close.php'; 
        return $products;
    }

    function getProductDetail($product_id) 
    {
        include 'libs/db_conn.php'; 

        $product = []; 
        $sql = "SELECT * FROM products WHERE product_id = $product_id"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc(); 
        }

        include 'libs/db_close.php'; 
        return $product; 
    }

    function getLatestProductsByCategory() 
    {
        include 'libs/db_conn.php'; 

        $latestProducts = [];
        $sql = "
            SELECT p.*
            FROM products p
            INNER JOIN (
                SELECT category_id, MAX(created_at) as latest_date
                FROM products
                GROUP BY category_id
            ) AS latest ON p.category_id = latest.category_id AND p.created_at = latest.latest_date
        ";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $latestProducts[] = $row;
            }
        }

        include 'libs/db_close.php'; 
        return $latestProducts; 
    }

    function searchProducts($query, $category_id = null) {
        include 'libs/db_conn.php'; 
    
        $products = [];
        $sql = "SELECT * FROM products WHERE (name LIKE '%$query%' OR description LIKE '%$query%')";
    
        if ($category_id !== null && $category_id !== '') {
            $sql .= " AND category_id = $category_id";
        }
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
    
        include 'libs/db_close.php'; 
        return $products;
    }

    function displayProducts($products){
        if (!empty($products)) {
            echo "<table class='product-table'>";
            echo "<thead>";
            echo "<tr><th>STT</th><th>Ảnh</th><th>Mô tả</th><th>Giá</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($products as $index => $product) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>
                    <a href='?page=productDetail&product_id=" . htmlspecialchars($product['product_id']) . "'>
                        <img src='" . "uploads/products/" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width:100px;'>
                    </a>
                    </td>";
                echo "<td>";
                echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";
                echo "<p>" . htmlspecialchars($product['description']) . "</p>"; 
                echo "</td>";
                echo "<td class='price'>" . number_format($product['price'], 0, ',', '.') . " $</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }
    }

    function sortProductsByPrice(&$products, $sort) {
        $n = count($products); 
    
        if ($sort == 'asc') {
            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($products[$j]['price'] > $products[$j + 1]['price']) {
                        $temp = $products[$j];
                        $products[$j] = $products[$j + 1];
                        $products[$j + 1] = $temp;
                    }
                }
            }
        }
        elseif ($sort == 'desc') {
            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($products[$j]['price'] < $products[$j + 1]['price']) {
                        $temp = $products[$j];
                        $products[$j] = $products[$j + 1];
                        $products[$j + 1] = $temp;
                    }
                }
            }
        }
        return $products;
    }
    
    // print_r(getProductsByCategory(1));
?>
