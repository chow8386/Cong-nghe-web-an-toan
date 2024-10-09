<?php
    session_start();
    $id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

    if (isset($_SESSION['students'])) {
        $students = $_SESSION['students'];
    } else {
        echo "No student data available.";
        exit;
    }

    if ($id < 0 || $id >= count($students)) {
        echo "Invalid student ID.";
        exit;
    }

    $student = $students[$id];
?>

<div id="center">
    <h2>Chi tiết sinh viên</h2>
    <div id="student-detail">
        <div class="avatar">
            <img src="<?php echo htmlspecialchars($student['avatar']); ?>" alt="Avatar" width="150" height="150">
        </div>
        <div>
            <p><strong>Tên:</strong> <?php echo htmlspecialchars($student['fullname']); ?></p>
            <p><strong>Ngày sinh:</strong> <?php echo htmlspecialchars($student['birthday']); ?></p>
            <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($student['address']); ?></p>
            <p><strong>Lớp:</strong> <?php echo htmlspecialchars($student['class']); ?></p>
        </div>
    </div>
</div>
