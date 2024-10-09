<?php
    $error_message = '';

    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        
        if (!empty($uname) && !empty($pass)) {
            include 'libs/db_conn.php'; 
    
            $uname = mysqli_real_escape_string($conn, $uname);
    
            $sql="SELECT * FROM users WHERE username = '".$uname. "'"; 
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
    
                if ($pass === $user['password']) {
                    $_SESSION['username'] = $uname;
                    $_SESSION['userID'] = $user['user_id'];
    
                    if ($user['role'] === 'admin') {
                        header('Location: admin/index.php?page=home'); 
                    } else if ($user['role'] === 'customer') {
                        header('Location: ?page=home');  
                    }
                    exit;
                } else {
                    $error_message = 'Sai username hoặc password!';
                }
            } else {
                $error_message = 'Sai username hoặc password!';
            }
    
            include 'libs/db_close.php'; 
        } else {
            $error_message = 'Vui lòng nhập đầy đủ thông tin!';
        }
    }
    
?>

<div class="main-content">
    <h2>Đăng nhập</h2>
    <form action="" method="post">
        <div class="row">
            <label>Username:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="username">
            </div>
        </div>

        <div class="row">
            <label>Password:</label>
            <div class="input-group">
                <input class="input-field" type="password" name="password" >
            </div>
        </div>

        <div>
            <button type="reset" name="reset-login">Nhập lại</button>
            <button type="submit" name="login">Đăng nhập</button>
        </div>

        <?php if (!empty($error_message)) { ?>
            <div class="error-message">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php } ?>
    </form>
</div>
