<?php
    function view($page = 1) {
        require_once 'libs/db_conn.php';

        $limit = 10;
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM HoSo LIMIT ?, ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<div id="center">';
            echo "<h2>Trang " . $page . "</h2>" ;
            while ($row = $result->fetch_assoc()) {
                echo $row["MaHs"] . ", ";
                echo $row["HoTen"] . ", ";
                echo $row["NgaySinh"] . ", ";
                echo $row["DiaChi"] . ", ";
                echo $row["Lop"] . ", ";
                echo $row["DiemToan"] . ", ";
                echo $row["DiemLy"] . ", ";
                echo $row["DiemHoa"] . "<br><br>";
            }
            echo '</div>';
        } else {
            echo "0 results";
        }
        require_once 'libs/db_close.php';
    }

    function add($maHs, $hoTen, $ngaySinh, $diaChi, $lop, $diemToan, $diemLy, $diemHoa) {
        require_once 'libs/db_conn.php';

        $sql = "INSERT INTO HoSo (MaHs, HoTen, NgaySinh, DiaChi, Lop, DiemToan, DiemLy, DiemHoa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssddd", $maHs, $hoTen, $ngaySinh, $diaChi, $lop, $diemToan, $diemLy, $diemHoa);
            
            if ($stmt->execute()) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        require_once 'libs/db_close.php';
    }

    function update($maHs, $hoTen, $ngaySinh, $diaChi, $lop, $diemToan, $diemLy, $diemHoa) {
        require_once 'libs/db_conn.php';

        $sql = "UPDATE HoSo SET HoTen = ?, NgaySinh = ?, DiaChi = ?, Lop = ?, DiemToan = ?, DiemLy = ?, DiemHoa = ? WHERE MaHs = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssddds", $hoTen, $ngaySinh, $diaChi, $lop, $diemToan, $diemLy, $diemHoa, $maHs);
            
            if ($stmt->execute()) {
                echo "Record updated successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        require_once 'libs/db_close.php';
    }

    function delete($maHs) {
        require_once 'libs/db_conn.php';

        $sql = "DELETE FROM HoSo WHERE MaHs = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $maHs);
            
            if ($stmt->execute()) {
                echo "Record deleted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        require_once 'libs/db_close.php';
    }

    view(2);

    // add("HS011", "Nguyễn Văn A", "2000-01-01", "Hà Nội", "10A", 8, 9, 7);
    // update("HS004", "Nguyễn Văn B", "2000-02-01", "Hà Nội", "10B", 8, 9, 7);
    // delete("HS004");
?>
