<?php
include '../libs/db_conn.php'; 
$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

if ($id < 0) {
    echo "Invalid product ID.";
    exit;
}

$sql = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.category_id WHERE p.product_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $old_category_id = $product['category_id']; 
} else {
    echo "No product found with the given ID.";
    exit;
}

if (isset($_POST['update-product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $intro = $_POST['intro'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];
    $image = $product['image_url']; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $old_image_path = "../uploads/products/" . $product['image_url'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        $target_dir = "../uploads/products/";
        $image = basename($_FILES['image']['name']); 
        $target_file = $target_dir . $image;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "Có lỗi khi tải ảnh lên.";
            exit;
        }
    }

    $sql_update = "UPDATE products SET name = '$name', description = '$description', price = '$price', stock = '$stock', category_id = '$category_id', image_url = '$image', intro = '$intro' WHERE product_id = $id";

    if ($conn->query($sql_update) === TRUE) {
        if ($old_category_id !== $category_id) {
            $sql_decrease_old = "UPDATE categories SET stock = stock - $stock WHERE category_id = $old_category_id";
            $conn->query($sql_decrease_old);

            $sql_increase_new = "UPDATE categories SET stock = stock + $stock WHERE category_id = $category_id";
            $conn->query($sql_increase_new);
        }

        header('Location: ?page=productList');
        exit;
    } else {
        echo "Có lỗi khi cập nhật sản phẩm: " . $conn->error;
    }
}

$conn->close(); 
?>

<div id="center">
    <h2>Edit Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label>Product Name:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
        </div>

        <div class="row">
            <label>Description:</label>
            <div class="input-group">
                <textarea name="description" rows="4" cols="32" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
        </div>

        <div class="row">
            <label>Intro:</label>
            <div class="input-group">
                <textarea name="intro" rows="4" cols="32" required><?php echo htmlspecialchars($product['intro']); ?></textarea>
            </div>
        </div>

        <div class="row">
            <label>Price:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
        </div>

        <div class="row">
            <label>Stock:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
            </div>
        </div>

        <div class="row">
            <label>Category:</label>
            <div class="input-group">
                <select name="category_id" required>
                    <option value="">Select a category</option>
                    <?php
                    include '../libs/db_conn.php'; 
                    $sql_categories = "SELECT category_id, name FROM categories";
                    $result_categories = $conn->query($sql_categories);
                    while ($category = $result_categories->fetch_assoc()) {
                        $selected = ($category['category_id'] == $product['category_id']) ? 'selected' : '';
                        echo "<option value=\"" . htmlspecialchars($category['category_id']) . "\" $selected>" . htmlspecialchars($category['name']) . "</option>";
                    }
                    include '../libs/db_close.php'; 
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <label>Image:</label>
            <div class="input-group">
                <input type="file" name="image" accept="image/*">
            </div>
        </div>
        <button type="submit" name="update-product">Update</button>
    </form>
</div>
