<?php
    include 'templates/Head.php';
    include 'templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';  // Mặc định là 'home' nếu không có tham số 'page'

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'drawTable':
            include 'pages/DrawTable.php';
            break;
        case 'contact':
            include 'pages/Contact.php';
            break;
        case 'loop':
            include 'pages/Loop.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'templates/Footer.php';
?>