<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
</head>
<body>
    <div id="head">
        <img src="assets/img/intro.jpg" alt="" id="banner">
        <div id="nav">
            <ul>
                <form action="" method="post">
                    <button type="submit" name="vn"><?php echo VIETNAMESE;?></button>
                    <button type="submit" name="es"><?php echo ENGLISH;?></button>
                </form>
            </ul>
            <ul>
                <li><a href="index.php?page=home"><?php echo HOME;?></a></li>
                <li><a href="index.php?page=contact"><?php echo CONTACT;?></a></li>
                <li><a href="index.php?page=intro"><?php echo INTRODUCTION;?></a></li>
                <li><a href="index.php?page=login"><?php echo LOGIN;?></a></li>
            </ul>
        </div>
    </div>

