<?php
    include 'templates/Head.php';
    include 'templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'register':
            include 'pages/Register.php';
            break;
        case 'infoUser':
            include 'pages/RegisterProcess.php';
            break;
        case 'contact':
            include 'pages/Contact.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'templates/Footer.php';
?>