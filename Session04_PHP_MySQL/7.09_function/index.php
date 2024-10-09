<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'matrix':
            include 'pages/Matrix.php';
            break;
        case 'array':
            include 'pages/Array.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'assets/templates/Footer.php';
?>