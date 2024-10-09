<?php
    $students = [];

    $filename = 'data/student.txt';
    $file = fopen($filename, 'r') or die("Unable to open file!");

    if ($file) {
        $i = 0;
        while (($line = fgets($file)) !== false) {
            $data = explode("|", $line);
            $students[$i] = array(
                0 => $data[0],
                1 => $data[1],
                2 => $data[2]
            );
            $i++;
    
        }
        fclose($file);
    }
?>

<div id="center">
    <h2>Danh sách sinh viên</h2>
    <?php
    // print_r($students);
    echo "<table>";
    echo "<tr><th>STT</th><th>Tên</th><th>Địa chỉ</th><th>Tuổi</th></tr>";
    for ($i = 0; $i < count($students); $i++) {
        echo "<tr>";
        echo "<td class='align-center'>" . ($i + 1) . "</td>";
        echo "<td class='align-center'>" . $students[$i][0] . "</td>";
        echo "<td class='align-center'>" . $students[$i][1] . "</td>";
        echo "<td class='align-center'>" . $students[$i][2] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>