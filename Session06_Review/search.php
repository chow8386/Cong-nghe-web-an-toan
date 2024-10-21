<?php
    session_start();
    //test
    $_SESSION['user'] = [
        'username' => 'admin',
        'role' => 'admin'
    ];
    
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        //hien thi form
        ?>
        <form method="get" action="">
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" required>
            <button type="submit">Tìm kiếm</button>
        </form>
        <?php
    } else {
        echo "Khong co quyen truy cap";
        exit();
    }

    if (isset($_GET['search'])) {
        $conn = new mysqli("localhost", "root", "", "SP2");
        // $conn = new mysqli("localhost", "CNWAT2", "cnwat@1234", "SP2");

        if ($conn->connect_error) {
            die("Loi ket noi csdl: " . $conn->connect_error);
        }

        $search = "%" . htmlspecialchars(trim($_GET['search'])) . "%";
    
        $stmt = $conn->prepare(
            "SELECT p.*, c.name AS category_name
             FROM products p
             JOIN categories c ON p.category_id = c.id
             WHERE p.name LIKE ?"
        );
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Mô tả</th><th>Loại sản phẩm</th><th></th><th></th></tr>';
    
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
                echo '<td>' . number_format($row["price"], 2) . '</td>';
                echo '<td>' . htmlspecialchars($row["description"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["category_name"]) . '</td>';
                echo '<td><a href="update.php">Cap nhat</a></td>';
                echo '<td><a href="delete.php">Xoa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Khong tim thay san pham nao";
        }
    
        $stmt->close();
        $conn->close();
    }
    
?>