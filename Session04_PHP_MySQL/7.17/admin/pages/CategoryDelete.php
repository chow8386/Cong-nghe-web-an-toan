<?php
    include '../libs/db_conn.php'; 

    if (isset($_GET['id'])) {
        $category_id = (int) $_GET['id']; 

        $sql = "DELETE FROM categories WHERE category_id = $category_id";

        if ($conn->query($sql) === TRUE) {
            header('Location: ?page=categoryList');
            exit;
        } else {
            echo "Có lỗi khi xóa danh mục: " . $conn->error;
        }
    } else {
        echo "ID danh mục không hợp lệ.";
    }

    include '../libs/db_close.php'; 
?>
