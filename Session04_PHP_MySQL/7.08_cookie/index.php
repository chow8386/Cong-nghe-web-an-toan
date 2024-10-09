<?php
    include 'templates/Head.php';
    include 'templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'login':
            include 'pages/Login.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'templates/Footer.php';
?>