<?php
    session_start();
    ob_start();
    include 'assets/templates/Header.php';
    include 'assets/templates/Left.php';
    
    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 
    
    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'productList':
            include 'pages/ProductList.php';
            break;
        case 'productDetail':
            include 'pages/ProductDetail.php';
            break;
        case 'productSearch':
            include 'pages/ProductSearch.php';
            break;
        case 'login':
            include 'pages/Login.php';
            break;
        case 'logout':
            include 'pages/Logout.php';
            break;
        default:
            echo "<div class='main-content'><h2>404 - Page Not Found</h2></div>";
            break;
    }

    include 'assets/templates/Footer.php';
?>