<?php
    session_start(); 

    $filename = 'data/student.txt';
    $students = [];

    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (($line = fgets($file)) !== false) {
            $studentData = explode('|', trim($line));
            if (count($studentData) == 5) {
                $students[] = [
                    'fullname' => $studentData[0],
                    'birthday' => $studentData[1],
                    'address' => $studentData[2],
                    'avatar' => $studentData[3],
                    'class' => $studentData[4]
                ];
            }
        }
        fclose($file);
    }

    $_SESSION['students'] = $students;
?>

<div id="center">
    <h2>Danh sách sinh viên</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Ảnh</th>
                <th>Lớp</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody class="font-edit">
            <?php if (!empty($students)) { ?>
                <?php for ($i = 0; $i < count($students); $i++) { ?>
                    <tr>
                        <td><?php echo ($i + 1); ?></td>
                        <td><?php echo htmlspecialchars($students[$i]['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($students[$i]['birthday']); ?></td>
                        <td><?php echo htmlspecialchars($students[$i]['address']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($students[$i]['avatar']); ?>" alt="Avatar" width="50" height="50"></td>
                        <td><?php echo htmlspecialchars($students[$i]['class']); ?></td>
                        <td>
                            <a href="index.php?page=detail&id=<?php echo $i; ?>">Detail</a> 
                            <a href="index.php?page=edit&id=<?php echo $i; ?>">Edit</a> 
                            <a href="index.php?page=delete&id=<?php echo $i; ?>" >Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="7">No student data found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
