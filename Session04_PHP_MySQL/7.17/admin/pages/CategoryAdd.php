<?php
    include '../libs/db_conn.php'; 

    if (isset($_POST['add-category'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock']; 

        $sql = "INSERT INTO categories (name, description, stock) 
                VALUES ('$name', '$description', '$stock')";

        if ($conn->query($sql)) {
            header('Location: ?page=categoryList');
            exit;
        } else {
            echo "Có lỗi khi thêm danh mục: " . $conn->error;
        }
    }

    include '../libs/db_close.php'; 
?>


<div id="center">
    <h2>Add category</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label>Category Name:</label>
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
            <label>Stock:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="stock" value="0" required>
            </div>
        </div>

        <button type="submit" name="add-category">Add</button>
    </form>
</div>

