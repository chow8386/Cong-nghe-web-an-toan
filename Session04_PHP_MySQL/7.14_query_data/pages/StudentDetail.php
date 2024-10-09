<div id="center">
    <?php
        $id = $_GET["studentID"];
        
        $sql = "SELECT s.id, s.studentName, s.studentGender, s.classID, c.*
        FROM students as s
        JOIN classes as c ON s.classID = c.id
        WHERE s.id = $id";

        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            while($row = mysqli_fetch_array($result)){
                echo "<h2>Chi tiết sinh viên</h2>";
                echo "<table>";
                echo "<tr><td>ID</td><td>". $id."</td></tr>";
                echo "<tr><td>Name</td><td>". $row["studentName"]."</td></tr>";
                echo "<tr><td>Giới tính</td><td>". $row["studentGender"]."</td></tr>";
                echo "<tr><td>ID lớp</td><td>". $row["classID"]."</td></tr>";
                echo "<tr><td>Tên lớp</td><td>". $row["className"]."</td></tr>";
                echo "<tr><td>Mô tả lớp</td><td>". $row["classDescription"]."</td></tr>";
                echo "<tr><td>Số lượng</td><td>". $row["numOfStudents"]."</td></tr>";
                echo "</table>";
            }
        }

        require_once 'libs/db_close.php';
    ?>
</div>