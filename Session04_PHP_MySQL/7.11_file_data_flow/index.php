<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'list':
            include 'pages/List.php';
            break;
        case 'add':
            include 'pages/Add.php';
            break;
        case 'detail':
            include 'pages/Detail.php';
            break;
        case 'edit':
            include 'pages/Edit.php';
            break;
        case 'delete':
            include 'pages/Delete.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'assets/templates/Footer.php';
?>
