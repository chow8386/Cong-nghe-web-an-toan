<?php
    include 'templates/Head.php';
    include 'templates/Left.php';
    session_start();
?>

<div id="center">
    <h2 class="align-center">Kết quả đăng ký</h2>
    <?php
        if (isset($_SESSION['name']) && isset($_SESSION['address']) && isset($_SESSION['job']) && isset($_SESSION['note'])) {
            echo "<div class='align-center'>";
            echo "<p>Tên: " . $_SESSION['name'] . "</p>";
            echo "<p>Địa chỉ: " . $_SESSION['address'] . "</p>";
            echo "<p>Nghề: " . $_SESSION['job'] . "</p>";
            echo "<p>Ghi chú: " . $_SESSION['note'] . "</p>";
            echo "</div>";

            session_unset();
            session_destroy();
        } else {
            echo "<p>Không có dữ liệu để hiển thị.</p>";
        }
    ?>
</div>

<?php
    include 'templates/Footer.php';
?>