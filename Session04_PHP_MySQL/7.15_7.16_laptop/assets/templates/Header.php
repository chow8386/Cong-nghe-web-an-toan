<?php
    require_once 'pages/ManageCategory.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" media="all">
    <title>Chow's Shop</title>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <a href="?page=home"><img src="assets/img/sheep.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="?page=home">Trang Chủ</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
                <li><a href="?page=login">Đăng Nhập</a></li>
                <li><a href="?page=logout">Đăng xuất</a></li>
            </ul>
        </nav>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-container">
            <form action="?page=productSearch" method="POST">
                <input type="text" name="query" placeholder="Tìm kiếm..." required>
                <select name="category_id">
                    <option value="">Chọn danh mục</option> <!-- Tùy chọn giá trị rỗng -->
                    <?php
                        $categories = getCategories();
                        foreach ($categories as $row) {
                            echo "<option value='". $row['category_id']. "'>". htmlspecialchars($row['name']). "</option>";
                        }
                    ?>
                </select>
                <button type="submit" name="find-product">Tìm kiếm</button>
            </form>
        </div>
    </div>

