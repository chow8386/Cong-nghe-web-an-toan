<?php
session_start(); 

$filename = 'data/student.txt';

if (!isset($_SESSION['students'])) {
    echo "<script>alert('Không có dữ liệu sinh viên!')</script>";
    header('Location: index.php?page=list');
    exit;
}

$students = $_SESSION['students'];
$studentToEdit = null;

if (isset($_GET['id'])) {
    $idToEdit = (int)$_GET['id'];

    if ($idToEdit >= 0 && $idToEdit < count($students)) {
        $studentToEdit = $students[$idToEdit]; // Lấy sinh viên theo ID
    } else {
        echo "<script>alert('ID không hợp lệ!')</script>";
        header('Location: index.php?page=list');
        exit;
    }
}

if (isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $avatar = $_FILES['avatar'];
    $class = $_POST['class'];

    if (!empty($fullname) && !empty($birthday) && !empty($address) && !empty($class)) {
        // Nếu có ảnh mới, xử lý upload
        if (!empty($avatar['name'])) {
            $avatarUploadDir = 'uploads/';
            if (!is_dir($avatarUploadDir)) {
                mkdir($avatarUploadDir, 0755, true);
            }
            $avatarPath = $avatarUploadDir . basename($avatar['name']);
            move_uploaded_file($avatar['tmp_name'], $avatarPath);
        } else {
            $avatarPath = $studentToEdit['avatar']; // Giữ nguyên ảnh cũ
        }

        $students[$idToEdit] = [
            'fullname' => $fullname,
            'birthday' => $birthday,
            'address' => $address,
            'avatar' => $avatarPath,
            'class' => $class
        ];

        $file = fopen($filename, 'w');
        foreach ($students as $student) {
            fwrite($file, implode('|', $student) . "\n");
        }
        fclose($file);

        $_SESSION['students'] = $students;

        echo "<script>alert('Update student successfully!')</script>";
    } else {
        echo "<script>alert('Please fill in all fields!')</script>";
    }
    header('Location: index.php?page=list');
    exit;
}
?>

<div id="center">
    <h2>Chỉnh sửa sinh viên</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <label>Tên:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="fullname" value="<?php echo htmlspecialchars($studentToEdit['fullname']); ?>">
            </div>
        </div>
        <div class="row">
            <label>Ngày sinh:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="birthday" value="<?php echo htmlspecialchars($studentToEdit['birthday']); ?>">
            </div>
        </div>
        <div class="row">
            <label>Địa chỉ:</label>
            <div class="input-group">
                <input class="input-field" type="text" name="address" value="<?php echo htmlspecialchars($studentToEdit['address']); ?>">
            </div>
        </div>
        <div class="row">
            <label>Ảnh:</label>
            <div class="file-upload">
                <input type="file" name="avatar">
                <img src="<?php echo htmlspecialchars($studentToEdit['avatar']); ?>" alt="Current Avatar" width="50" height="50">
            </div>
        </div>
        <div class="row">
            <label>Lớp:</label>
            <select name="class" required>
                <option value="A" <?php if ($studentToEdit['class'] == 'A') echo 'selected'; ?>>A</option>
                <option value="B" <?php if ($studentToEdit['class'] == 'B') echo 'selected'; ?>>B</option>
                <option value="C" <?php if ($studentToEdit['class'] == 'C') echo 'selected'; ?>>C</option>
            </select>
        </div>
        <div>
        <button type="submit" name="edit">Lưu</button>
        </div>
    </form>
</div>
