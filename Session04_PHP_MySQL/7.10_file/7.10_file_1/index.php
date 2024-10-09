<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'add-student':
            include 'pages/AddStudent.php';
            break;
        case 'list-student':
            include 'pages/ListStudent.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }

    include 'assets/templates/Footer.php';
?>
