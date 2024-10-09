<?php
include '../libs/db_conn.php'; 

if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id']; 

    $sql_get_user = "SELECT image FROM users WHERE user_id = $user_id";
    $result = $conn->query($sql_get_user);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $image_path = "uploads/" . $user['image'];

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $sql_delete_user = "DELETE FROM users WHERE user_id = $user_id";
        
        if ($conn->query($sql_delete_user) === TRUE) {
            header('Location: ?page=userList');
            exit;
        } else {
            echo "Có lỗi khi xóa người dùng: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy người dùng với ID đã cho.";
    }
} else {
    echo "ID người dùng không hợp lệ.";
}

include '../libs/db_close.php'; 
?>
