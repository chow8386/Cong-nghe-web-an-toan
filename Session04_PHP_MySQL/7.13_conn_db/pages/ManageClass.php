<?php
    function view() {
        require_once 'libs/db_conn.php';

        $sql = "SELECT * FROM Lop";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["MaLop"] . ", ";
                echo $row["TenLop"] . ", ";
                echo $row["KhoaHoc"] . ", ";
                echo $row["Gvcn"] . "<br><br>";
            }
        } else {
            echo "0 results";
        }

        require_once 'libs/db_close.php';
    }

    function add($tenLop, $khoaHoc, $gvcn) {
        require_once 'libs/db_conn.php';

        $sql = "INSERT INTO Lop (TenLop, KhoaHoc, GVCN) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sis", $tenLop, $khoaHoc, $gvcn);
    
            if ($stmt->execute()) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Eror: " . $conn->error;
        }

        require_once 'libs/db_close.php';
    }
    function update($maLop, $tenLop, $khoaHoc, $gvcn) {
        require_once 'libs/db_conn.php';

        $sql = "UPDATE Lop SET TenLop = ?, KhoaHoc = ?, Gvcn = ? WHERE MaLop = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("siss", $tenLop, $khoaHoc, $gvcn, $maLop);

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

    function delete ($maLop) {
        require_once 'libs/db_conn.php';

        $sql = "DELETE FROM Lop WHERE MaLop = " . $maLop;
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        require_once 'libs/db_close.php';
    }

    view();
    // add("AT18B", 18, "Mai Thị B");
    // update(7, "AT18C", 18, "Lê Minh C");
    // delete(5);
    
?>