<?php
include '../libs/db_conn.php'; 

if (isset($_GET['id'])) {
    $product_id = (int)$_GET['id']; 

    $sql_get_product = "SELECT stock, category_id, image_url FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql_get_product);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $category_id = $product['category_id'];
        $stock = $product['stock'];
        $image_path = "../uploads/products/" . $product['image_url'];

        $sql_update_category = "UPDATE categories SET stock = stock - $stock WHERE category_id = $category_id";
        $conn->query($sql_update_category);

        $sql_delete_product = "DELETE FROM products WHERE product_id = $product_id";
        
        if ($conn->query($sql_delete_product) === TRUE) {

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            header('Location: ?page=productList');
            exit;
        } else {
            echo "Có lỗi khi xóa sản phẩm: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy sản phẩm với ID đã cho.";
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
}

include '../libs/db_close.php'; 
?>
