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

function registerUser() {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    $rePassword = htmlspecialchars($_POST['repassword']);

    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($rePassword)) {
        echo "Vui long khong de trong cac truong<br>";
        return;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email khong hop le<br>";
        return;
    } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
        echo "So dien thoai khong hop le<br>";
        return;
    } else if (!isValidPassword($password)) {
        echo "Mat khau >=8 ky tu va bao gom > 2 nhom ky tu khac nhau<br>";
        return;
    } else if ($password !== $rePassword) {
        echo "Mat khau khong khop<br>";
        return;
    }

    $conn = new mysqli('localhost', 'root', '', 'quanly_nv');

    if ($conn->connect_error) {
        die("Loi ket noi csdl: " . $conn->connect_error);
    }
    // echo "Connected";

    $check_stmt = $conn->prepare("SELECT * FROM user2 WHERE email = ? OR phone = ?");
    $check_stmt->bind_param("ss", $email, $phone);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email hoac SDT nay da duoc dang ky";
        $check_stmt->close();
        $conn->close();
        return;
    }
    
    $salt = bin2hex(random_bytes(16)); 
    $hashedPassword = sha1($password . $salt);

    $stmt = $conn->prepare("INSERT INTO user2 (username, email, phone, pass, salt) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $phone, $hashedPassword, $salt);

    if ($stmt->execute()) {
        echo "Dang ky thanh cong";
        header('Location: login.php');
        exit();
    } else {
        echo "Loi khi dang ky: ". $conn->error;
    }

    $stmt->close();
    $conn->close();

}

if (isset($_POST['register'])) {
    registerUser();
}

?>

<!DOCTYPE html>
<html lang="vi">
    <meta charset="UTF-8">
    <title>Dang ky</title>
<head>
</head>
<body>
    <form action="" method="post">
        Username: 
        <input type="text" name="username">
        <br>
        Email:
        <input type="text" name="email">
        <br>
        Phone:
        <input type="text" name="phone">
        <br>
        Password:
        <input type="password" name="password">
        <br>
        Repassword:
        <input type="password" name="repassword">
        <br>

        <button type="reset" >Reset</button>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
