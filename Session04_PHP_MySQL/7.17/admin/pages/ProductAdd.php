<?php
    include '../libs/db_conn.php'; 

    $categories = [];
    $sql_categories = "SELECT category_id, name FROM categories";
    $result_categories = $conn->query($sql_categories);

    if ($result_categories->num_rows > 0) {
        while ($row = $result_categories->fetch_assoc()) {
            $categories[] = [
                'category_id' => $row['category_id'],
                'name' => $row['name']
            ];
        }
    }

    if (isset($_POST['add-product'])) {
        $name = $_POST['name'];
        $description = $_POST['description']; 
        $intro = $_POST['intro']; 
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category_id = $_POST['category_id'];
        $image = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../uploads/products/";
            $image = basename($_FILES['image']['name']); 
            $target_file = $target_dir . $image;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "Có lỗi khi tải ảnh lên.";
                exit;
            }
        }

        $sql = "INSERT INTO products (name, description, intro, price, stock, category_id, image_url) 
                VALUES ('$name', '$description', '$intro', $price, $stock, $category_id, '$image')";

        if ($conn->query($sql)) {
            $sql_update = "UPDATE categories SET stock = stock + $stock WHERE category_id = $category_id";
            $conn->query($sql_update);

            header('Location: ?page=productList');
            exit;
        } else {
            echo "Có lỗi khi thêm sản phẩm: " . $conn->error;
        }
    }

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Add Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label>Product Name:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="name" required>
            </div>
        </div>

        <div class="row">
            <label>Description:</label>
            <div class="input-group">
                <textarea name="description" rows="4" cols="32" required></textarea>
            </div>
        </div>

        <div class="row">
            <label>Intro:</label>
            <div class="input-group">
                <textarea name="intro" rows="4" cols="32" required></textarea>
            </div>
        </div>

        <div class="row">
            <label>Price:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="price" step="0.01" required>
            </div>
        </div>

        <div class="row">
            <label>Stock:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="stock" required>
            </div>
        </div>

        <div class="row">
            <label>Category:</label>
            <div class="input-group">
                <select name="category_id" required>
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['category_id']; ?>">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row">
            <label>Image:</label>
            <div class="input-group">
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <button type="submit" name="add-product">Add</button>
    </form>
</div>
