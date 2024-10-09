<div id="content">
    <div id="left">
        <!-- <img src="assets/img/layout01.png" alt="">
        <br>
        <img src="assets/img/layout02.jpg" alt="cuu_day"> -->
        <h4>Danh sách các lớp</h4>
        <?php 
            require_once 'libs/db_conn.php';

            $sql = "SELECT * FROM classes";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p><a href='?page=list&class=". $row['id']. "'>". $row['className']. "</a></p>";
            }

            // require_once 'libs/db_close.php';
        ?>
    </div>

