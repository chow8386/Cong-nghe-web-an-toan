<?php
session_start();

$_SESSION['user'] = [
    'username' => 'stoker',
    'role' => 'stoker'
];

// $_GET['id'] = 3;

$conn = new mysqli("localhost", "root", "", "SP"); 
if ($conn->connect_error) {
    die("Loi ket noi csdl: " . $conn->connect_error);
}
$product = null;

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    if (filter_var($product_id, FILTER_VALIDATE_INT)) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
    } else {
        echo "ID san pham khong hop le";
    }
    
}

if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'stoker' && $product) {
    ?>
    <form action="" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <label for="">Ten san pham: </label>
        <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
        <br><br>

        <label for="">Gia san pham: </label>
        <input type="text" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
        <br><br>

        <label for="">Mo ta san pham: </label>
        <textarea name="product_description"><?php echo htmlspecialchars($product['description']); ?></textarea>
        <br><br>

        <label for="">Danh muc san pham: </label>
        <select name="category_id">
            <option value="">Chon danh muc</option>
            <option value="1" <?php echo $product['category_id'] == 1 ? 'selected' : ''; ?>>Loai 1</option>
            <option value="2" <?php echo $product['category_id'] == 2 ? 'selected' : ''; ?>>Loai 2</option>
        </select>
        <br><br>

        <input type="submit" value="Update">
    </form>
    <?php
} else {
    echo "Khong co quyen truy cap hoac san pham khong ton tai";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = htmlspecialchars($_POST['product_id']);
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_price = htmlspecialchars($_POST['product_price']);
    $product_description = htmlspecialchars($_POST['product_description']);
    $category_id = htmlspecialchars($_POST['category_id']);

    if (empty($product_name) || empty($product_price) || empty($product_description) || $category_id == 0) {
        echo "Vui long nhap day du thong tin";
    } else {
        $stmt = $conn->prepare("
            UPDATE products 
            SET name = ?, price = ?, description = ?, category_id = ? 
            WHERE id = ?
        ");
        $stmt->bind_param("sdsii", $product_name, $product_price, $product_description, $category_id, $product_id);

        if ($stmt->execute()) {
            echo "Cap nhat thanh cong";
        } else {
            echo "Loi khi cap nhat san pham";
        }

        $stmt->close();
    }
}

$conn->close();
?>
