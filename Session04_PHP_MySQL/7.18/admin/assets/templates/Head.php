<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
    <!-- <link rel="stylesheet" href="../ckeditor/samples/css/samples.css"> -->
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckeditor/samples/js/sample.js"></script>
</head>
<body>
    <div id="head">
        <img src="assets/img/intro.jpg" alt="" id="banner">
        <div id="nav">
            <ul>
                <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li><a href="../?page=logout">Logout</a></li>';
                    } else {
                        header('Location: ../?page=login');
                        exit;
                    }
                ?>
                <li><a href="?page=productList">Products</a></li>
                <li><a href="?page=categoryList">Categories</a></li>
                <li><a href="?page=userList">Users</a></li>
                <li><a href="../?page=home">Return Home</a></li>
            </ul>
        </div>
    </div>

