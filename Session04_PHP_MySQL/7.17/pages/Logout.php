<?php
    unset($_SESSION['username']); 
    session_destroy();

    header('Location: ?page=home');  
    exit;
?>