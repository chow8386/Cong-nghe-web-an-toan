<?php
    session_start();
    ob_start();
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'userList':
            include 'pages/UserList.php';
            break;
        case 'userAdd':
            include 'pages/userAdd.php';
            break;
        case 'userDetail':
            include 'pages/userDetail.php';
            break;
        case 'userEdit':
            include 'pages/userEdit.php';
            break;
        case 'userDelete':
            include 'pages/userDelete.php';
            break;
        case 'categoryList':
            include 'pages/CategoryList.php';
            break;
        case 'categoryAdd':
            include 'pages/CategoryAdd.php';
            break;
        case 'categoryEdit':
            include 'pages/CategoryEdit.php';
            break;
        case 'categoryDelete':
            include 'pages/CategoryDelete.php';
            break;
        case 'productList':
            include 'pages/ProductList.php';
            break;
        case 'productDetail':
            include 'pages/ProductDetail.php';
            break;
        case 'productAdd':
            include 'pages/ProductAdd.php';
            break;
        case 'productEdit':
            include 'pages/ProductEdit.php';
            break;
        case 'productDelete':
            include 'pages/ProductDelete.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'assets/templates/Footer.php';
?>
