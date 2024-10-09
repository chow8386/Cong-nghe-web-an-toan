<div class="main-content">
    <h2>HOME PAGE</h2>
    <?php
        if (isset($_SESSION['username'])) {
            echo "<h3>Xin chào, " . $_SESSION['username']. "</h3>";
        }
    ?>
    <?php
        include 'ManageProduct.php';

        // Lấy danh sách sản phẩm mới nhất của mỗi danh mục
        $latestProducts = getLatestProductsByCategory();

        displayProducts($latestProducts);
    ?>
</div>
