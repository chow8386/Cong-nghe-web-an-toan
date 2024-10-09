<?php
include '../libs/db_conn.php'; 
$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

if ($id < 0) {
    echo "Invalid user ID.";
    exit;
}

$sql = "SELECT * FROM users WHERE user_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found with the given ID.";
    exit;
}

if (isset($_POST['update-user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $image = $user['image'];

    if (!empty($password)) {
        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }
    } else {
        $password = $user['password']; 
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $old_image_path = "uploads/" . $user['image'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        $target_dir = "uploads/";
        $image = basename($_FILES['image']['name']); 
        $target_file = $target_dir . $image;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "Có lỗi khi tải ảnh lên.";
            exit;
        }
    }

    $sql_update = "UPDATE users SET username = '$username', password = '$password', email = '$email', phone = '$phone', address = '$address', image = '$image' WHERE user_id = $id";
    
    if ($conn->query($sql_update) === TRUE) {
        header('Location: ?page=userList');
        exit;
    } else {
        echo "Có lỗi khi cập nhật người dùng: " . $conn->error;
    }
}

$conn->close(); 
?>

<div id="center">
    <h2>Edit User</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label>Username:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
            </div>
        </div>

        <div class="row">
            <label>Password:</label>
            <div class="input-group">
                <input class="input-field" type="password" name="password">
            </div>
        </div>

        <div class="row">
            <label>Confirm Password:</label>
            <div class="input-group">
                <input class="input-field" type="password" name="confirm_password">
            </div>
        </div>

        <div class="row">
            <label>Email:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
        </div>

        <div class="row">
            <label>Phone:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>
        </div>

        <div class="row">
            <label>Address:</label>
            <div class="input-group">
                <textarea name="address" rows="4" cols="32"><?php echo htmlspecialchars($user['address']); ?></textarea>
            </div>
        </div>

        <div class="row">
            <label>Image:</label>
            <div class="input-group">
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <button type="submit" name="update-user">Update</button>
    </form>
</div>
