<?php
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

    session_start();
    //test
    $_SESSION['user'] = 2;

    if(!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_SESSION['user'];
        $current_password = htmlspecialchars($_POST['current_password']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
            echo "Vui long nhap day du thong tin";
            exit();
        } else if (!isValidPassword($current_password) || !isValidPassword($new_password) || !isValidPassword($confirm_password)) {
            echo "Mat khau khong hop le";
            exit();
        } else if ($new_password !== $confirm_password) {
            echo "Mat khau moi khong khop";
            exit();
        }

        $conn = new mysqli("localhost", "root", "", "quanly_nv");
        if ($conn->connect_error) {
            die("Loi ket noi csdl: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT pass, salt FROM user WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $salt = $row['salt'];
        $current_hash_pass = trim(sha1($current_password . $salt));

        if ($current_hash_pass === trim($row['pass'])) {
            $new_hash_pass = sha1($new_password . $salt);
            $stmt = $conn->prepare("UPDATE user SET pass = ? WHERE username = ?");
            $stmt->bind_param("ss", $new_hash_pass, $username);
            if ($stmt->execute()) {
                echo "Change password successfully!";
            } else {
                echo "Loi khi doi mat khau";
            }
        } else {
            echo "Mat khau cu khong khop";
            exit();
        }

        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doi mat khau</title>
</head>
<body>
    <h1>Doi mat khau</h1>
    <form action="" method="post">
        <label for="">Mat khau hien tai: </label>
        <input type="password" name="current_password">
        <br><br>
        <label for="">Mat khau moi: </label>
        <input type="password" name="new_password">
        <br><br>
        <label for="">Nhap lai mat khau moi: </label>
        <input type="password" name="confirm_password">
        <br><br>
        <input type="submit" value="Change password">
    </form>
</body>
</html>