<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'list':
            include 'pages/ListStudentInClass.php';
            break;
        case 'detail':
            include 'pages/StudentDetail.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    // include 'assets/templates/Footer.php';
?>
