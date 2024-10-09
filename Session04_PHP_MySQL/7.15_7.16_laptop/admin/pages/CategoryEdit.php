<?php
    include '../libs/db_conn.php'; 

    $id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

    if ($id < 0) {
        echo "Invalid category ID.";
        exit;
    }

    $sql = "SELECT * FROM categories WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        echo "No category found with the given ID.";
        exit;
    }

    $stmt->close();

    if (isset($_POST['update-category'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];

        $sql_update = "UPDATE categories SET name = ?, description = ?, stock = ? WHERE category_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssii", $name, $description, $stock, $id);

        if ($stmt_update->execute()) {
            header('Location: ?page=categoryList');
            exit;
        } else {
            echo "Có lỗi khi cập nhật danh mục: " . $conn->error;
        }
        
        $stmt_update->close();
    }

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Edit Category</h2>
    <form action="" method="POST">
        <div class="row">
            <label>Category Name:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
            </div>
        </div>

        <div class="row">
            <label>Description:</label>
            <div class="input-group">
                <textarea name="description" rows="4" cols="32" required><?php echo htmlspecialchars($category['description']); ?></textarea>
            </div>
        </div>

        <div class="row">
            <label>Stock:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="stock" value="<?php echo htmlspecialchars($category['stock']); ?>" required>
            </div>
        </div>

        <button type="submit" name="update-category">Update</button>
    </form>
</div>
