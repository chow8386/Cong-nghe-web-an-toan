<?php
    include '../libs/db_conn.php'; 

    if (isset($_POST['add-user'])) {
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $image = '';
        $role = 'customer'; 

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $image = basename($_FILES['image']['name']); 
            $target_file = $target_dir . $image;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "Có lỗi khi tải ảnh lên.";
                exit;
            }
        }

        $sql = "INSERT INTO users (username, password, email, phone, address, role, image) 
                VALUES ('$username', '$password', '$email', '$phone', '$address', '$role', '$image')";

        if ($conn->query($sql)) {
            header('Location: ?page=userList');
            exit;
        } else {
            echo "Có lỗi khi thêm người dùng: " . $conn->error;
        }
    }

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Add user</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label>Username:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="username">
            </div>
        </div>

        <div class="row">
            <label>Password:</label>
            <div class="input-group">
                <input class="input-field" type="password" name="password">
            </div>
        </div>

        <div class="row">
            <label>Email:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="email">
            </div>
        </div>

        <div class="row">
            <label>Phone:</label>
            <div class="input-group">
                <input class="input-field" type="number" name="phone">
            </div>
        </div>

        <div class="row">
            <label>Address:</label>
            <div class="input-group">
                <textarea name="address" rows="4" cols="32"></textarea>
            </div>
        </div>

        <div class="row">
            <label>Image:</label>
            <div class="input-group">
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <button type="submit" name="add-user">Add</button>
    </form>
</div>
