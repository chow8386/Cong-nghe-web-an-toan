<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }

    session_start();
    $lang = "english";
    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    }

    require_once ("lang/" . $lang . ".php");

    if (isset($_POST['es'])) {
        $_SESSION['lang'] = "english";
        header("location: index.php?page=" . $page);
    }

    if (isset($_POST['vn'])) {
        $_SESSION['lang'] = "vietnamese";
        header("location: index.php?page=" . $page);
    }
?>

<?php
    include 'assets/templates/Head.php';
    include 'assets/templates/Left.php';

    switch ($page) {
        case 'home':
            include 'pages/Home.php';
            break;
        case 'contact':
            include 'pages/Contact.php';
            break;
        case 'intro':
            include 'pages/Introduction.php';
            break;
        case 'login':
            include 'pages/Login.php';
            break;
        default:
            echo "<h2>404 - Page Not Found</h2>";
            break;
    }    

    include 'assets/templates/Footer.php';
?>
