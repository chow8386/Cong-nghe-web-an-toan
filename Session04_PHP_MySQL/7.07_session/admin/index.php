<?php
    include 'assets/templates/Header.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'upload':
            include 'pages/Upload.php';
            break;
        case 'logout':
            include 'pages/Logout.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }
    include 'assets/templates/Footer.php';
?>