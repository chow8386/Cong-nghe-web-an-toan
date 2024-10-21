<?php
session_start();

function isValidPassword($password) {
    if (strlen($password) < 8) {
        return false;
    }

    $types = [
        preg_match('/[A-Z]/', $password),
        preg_match('/[a-z]/', $password),
        preg_match('/\d/', $password),
        preg_match('/\W/', $password)
    ];

    return count(array_filter($types)) >= 2;
}

function check_login($username, $password) {
    $conn = new mysqli('localhost', 'root', '', 'quanly_nv');

    if ($conn->connect_error) {
        die("Loi ket noi CSDL: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT pass, salt FROM user WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 

        $hash_pass = sha1($password . $row['salt']);
        
        if ($hash_pass === $row['pass']) {
            $_SESSION['username'] = $username;

            $authToken = bin2hex(random_bytes(32));
            setcookie('authToken', $authToken, [
                'expires' => time() + 3600, 
                'path' => '/',
                'domain' => 'localhost', //.example.com
                'secure' => true, 
                'httponly' => true, 
                'samesite' => 'Strict' 
            ]);

            echo "Hello " . htmlspecialchars($_SESSION['username'], ENT_QUOTES);
            exit();
        } else {
            echo "Sai username hoac password";
        }
    } else {
        echo "Sai username hoac password";
    }

    $stmt->close();
    $conn->close();
}

function action() {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Vui long nhap day du thong tin";
    } else if (!isValidPassword($password)) {
        echo "Mat khau khong hop le";
    } else {
        check_login($username, $password);
    }
}

if (isset($_POST['login'])) {
    action();
}
//account: 1/1234567.
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dang nhap</title>
</head>
<body>
    <form action="" method="post">
        Tên đăng nhập: 
        <input type="text" name="username">
        <br>
        Mật khẩu:
        <input type="password" name="password">
        <br>
        <button type="reset">Reset</button>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
