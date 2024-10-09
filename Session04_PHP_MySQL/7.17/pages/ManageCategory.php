<?php
    function getCategories() {
        include 'libs/db_conn.php'; 

        $categories = []; 
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row; 
            }
        }

        include 'libs/db_close.php'; 
        return $categories; 
    }
  
    

    // print_r(getCategories());
?>
