<div id="center">
    <?php
    if (!isset($_SESSION['username'])) {
        header('Location: ?page=login');
        exit;
    }
    else 
    {
        echo "<h2>HOME PAGE</h2>";
    }
    
    ?>
</div>