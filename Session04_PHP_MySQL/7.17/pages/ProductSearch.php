<div class="main-content">
    <?php
        include 'ManageProduct.php';

        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
        $sort = isset($_POST['sort']) ? $_POST['sort'] : '';
        $products = searchProducts($query, $category_id);
    ?>
    
    <h2>Kết quả tìm kiếm '<?php echo htmlspecialchars($query); ?>'</h2>
    <form method="POST" action="">
        <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>">
        <label for="sort">Sắp xếp theo giá:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="">Chọn</option>
            <option value="asc" <?php echo ($sort == 'asc' ? 'selected' : ''); ?>>Giá tăng dần</option>
            <option value="desc" <?php echo ($sort == 'desc' ? 'selected' : ''); ?>>Giá giảm dần</option>
        </select>
    </form>
    
    <?php
        if ($sort) {
            $products = sortProductsByPrice($products, $sort);
        }
        displayProducts($products);
    ?>
</div>
