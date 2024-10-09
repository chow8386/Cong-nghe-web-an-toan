<div id="center">
    <h2>Danh sách sinh viên có trong lớp</h2>
    <?php
        $classID = $_GET['class'];

        $sql = "SELECT s.id, s.studentName, s.studentGender, c.className
        FROM students as s
        JOIN classes as c ON s.classID = c.id
        WHERE c.id = $classID";

        // $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "<table>";
            echo "<tr><th>Tên</th><th>Giới tính</th><th>Tên lớp</th><th>Thao tác</th></tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['studentName'] . "</td>";
                echo "<td>" . $row['studentGender'] . "</td>"; 
                echo "<td>" . $row['className'] . "</td>";
                echo "<td><a href='?page=detail&studentID=" . $row['id'] . "'>Chi tiết</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }
        
        require_once 'libs/db_close.php';
    ?>
    
</div>