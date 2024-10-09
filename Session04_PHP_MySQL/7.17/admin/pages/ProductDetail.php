<?php
include '../libs/db_conn.php'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

if ($id < 0) {
    echo "Invalid product ID.";
    exit;
}

$sql = "SELECT * FROM products WHERE product_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();

    $category_id = $product['category_id'];
    $sql_category = "SELECT name FROM categories WHERE category_id = $category_id";
    $result_category = $conn->query($sql_category);

    $category_name = '';
    if ($result_category->num_rows > 0) {
        $category = $result_category->fetch_assoc();
        $category_name = htmlspecialchars($category['name']);
    } else {
        $category_name = "Category not found";
    }
} else {
    echo "No product found with the given ID.";
    exit;
}
include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Product Detail</h2>
    <div id="detail">
        <div class="avatar">
            <img src="<?php echo "../uploads/products/" . htmlspecialchars($product['image_url']); ?>" alt="Product Image" width="150" height="150">
        </div>
        <div>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><strong>Price:</strong> <?php echo htmlspecialchars($product['price']); ?> VND</p>
            <p><strong>Stock:</strong> <?php echo htmlspecialchars($product['stock']); ?></p>
            <p><strong>Category:</strong> <?php echo $category_name; ?></p> <!-- Hiển thị tên danh mục -->
            <p><strong>Intro:</strong> <?php echo htmlspecialchars($product['intro']); ?></p>
        </div>
    </div>
</div>
