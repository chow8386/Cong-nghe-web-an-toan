<?php
    $username = '';
    $password = '';
    $error_message = '';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!empty($username) || !empty($password)) {
            if ($username === 'admin' && $password === 'admin') {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
    
                header('Location: admin/index.php');
                exit;
            } else {
                $error_message = 'Sai username hoặc password!';
            }
        } else {
            $error_message = 'Vui lòng nhập đầy đủ thông tin!';
        }
    }
?>

<div id="center">
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
            <input class="input-field" type="password" name="password">
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