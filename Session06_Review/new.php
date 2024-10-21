<?php
    session_start();

    $_SESSION['user'] = [
        'username' => 'stoker',
        'role' => 'stoker'
    ];

    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'stoker') {
        ?>
            <form action="" method="post">
                <label for="">Ten san pham: </label>
                <input type="text" name="product_name">
                <br><br>
                <label for="">Gia san pham: </label>
                <input type="text" name="product_price">
                <br><br>
                <label for="">Mo ta san pham: </label>
                <textarea name="product_description" id=""></textarea>
                <br><br>
                <label for="">Danh muc san pham: </label>
                <select name="category_id" id="">
                    <option value="">Chon danh muc</option>
                    <!-- test -->
                    <option value="1">Loai 1</option>
                    <option value="2">Loai 2</option>
                </select>
                <br><br>
                <input type="submit" value="Add">
            </form>
        <?php
    } else {
        echo "Khong co quyen truy cap";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = htmlspecialchars($_POST['product_name']);
        $product_price = htmlspecialchars($_POST['product_price']);
        $product_description = htmlspecialchars($_POST['product_description']);
        $category_id = htmlspecialchars($_POST['category_id']);

        if (empty($product_name) || empty($product_price || empty($product_description)) || $category_id == 0) {
            echo "Vui long nhap day du thong tin";
        } else {
            $conn = new mysqli("localhost", "root", "", "SP");
            // $conn = new mysqli("localhost", "CNWAT", "abc@1234", "SP");
            if ($conn->connect_error) {
                die("Loi ket noi csdl: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("
                INSERT INTO products (name, price, description, category_id)
                VALUES (?, ?, ?, ?)
            ");

            $stmt->bind_param("sdsi", $product_name, $product_price, $product_description, $category_id); 
            
            if ($stmt->execute()) {
                echo "Them thanh cong";
            } else {
                echo "Loi khi them san pham";
            }

            $stmt->close();
            $conn->close();
        }
    }
?>