<?php
    function addToCart($userId, $productId, $quantity) {
        include 'libs/db_conn.php'; 
        $sql_check = "SELECT * FROM shoppingcart WHERE user_id = $userId AND product_id = $productId";
        $result = $conn->query($sql_check);

        if ($result->num_rows === 0) {
            $sql_insert = "INSERT INTO shoppingcart (user_id, product_id, quantity) VALUES ($userId, $productId, $quantity)";
            $conn->query($sql_insert);
        } else {
            $row = $result->fetch_assoc();
            $newQuantity = $row['quantity'] + $quantity;
            $sql_update = "UPDATE shoppingcart SET quantity = $newQuantity WHERE user_id = $userId AND product_id = $productId";
            $conn->query($sql_update);
        }
        include 'libs/db_close.php'; 
    }

    function removeFromCart($userId, $productId) {
        include 'libs/db_conn.php'; 
    
        $sql_check = "SELECT * FROM shoppingcart WHERE user_id = $userId AND product_id = $productId";
        $result = $conn->query($sql_check);
    
        if ($result && $result->num_rows > 0) {
            $sql_delete = "DELETE FROM shoppingcart WHERE user_id = $userId AND product_id = $productId";
            $conn->query($sql_delete);
            echo "<p>Sản phẩm đã được xóa khỏi giỏ hàng!</p>";
        }
    
        include 'libs/db_close.php'; 
    }
    
?>