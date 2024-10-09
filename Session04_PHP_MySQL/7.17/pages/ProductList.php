<div class="main-content">
    <h2>Danh sách sản phẩm</h2>
    <?php
        include 'ManageProduct.php';

        $category_id = $_GET['category_id'];
        $products = getProductsByCategory($category_id);

        $sort = isset($_POST['sort']) ? $_POST['sort'] : '';
    ?>

    <form method="POST" action="">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>">
        <label for="sort">Sắp xếp theo giá:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="" >Chọn</option>
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
