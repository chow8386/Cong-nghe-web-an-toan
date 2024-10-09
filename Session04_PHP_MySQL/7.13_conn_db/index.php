<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'manage-profile':
            include 'pages/ManageProfile.php';
            break;
        case 'manage-class':
            include 'pages/ManageClass.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'assets/templates/Footer.php';
?>
