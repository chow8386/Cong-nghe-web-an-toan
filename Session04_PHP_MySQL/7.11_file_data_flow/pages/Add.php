<?php
    $fullname = '';
    $birthday = '';
    $address = '';
    $class = '';
    $avatar = '';
    $filename = 'data/student.txt';
 
    if (isset($_POST['add'])) {
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $avatar = $_FILES['avatar'];
        $class = $_POST['class'];
    
        if (!empty($fullname) && !empty($birthday) && !empty($address) && !empty($class) && !empty($avatar['name'])) {
            
            $avatarUploadDir = 'uploads/';
            if (!is_dir($avatarUploadDir)) {
                mkdir($avatarUploadDir, 0755, true);
            }
    
            $avatarPath = $avatarUploadDir . basename($avatar['name']);
            move_uploaded_file($avatar['tmp_name'], $avatarPath);

            $file = fopen($filename, 'a') or die("Unable to open file!");
            if($file) {
                fwrite($file, "\n" . $fullname . "|" . $birthday . "|" . $address . "|" . $avatarPath . "|" . $class);

                echo "<script type='text/javascript'>alert('Add student successfully!');</script>";
            }
            fclose($file);
        } else {
            echo "<script type='text/javascript'>alert('Please fill in all fields!');</script>";
        }
        header("Location: index.php?page=list");
    }

?>

<div id="center">
    <h2>Thêm sinh viên</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <label>Full name:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="fullname" value="<?php echo $fullname; ?>">
            </div>
        </div>
        <div class="row">
            <label>Birthday:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="birthday" value="<?php echo $birthday; ?>">
            </div>
        </div>
        <div class="row">
            <label>Address:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="row">
            <label>Image:</label>
            <div class="file-upload">
            <input class="" type="file" name="avatar">
            </div>
        </div>
        <div class="row">
            <label>Class:</label>
            <select name="class" required>  
                <option value="A">A</option>  
                <option value="B">B</option>  
                <option value="C">C</option>
            </select> 
        </div>
        <div>
            <button type="reset" name="reset-add">Nhập lại</button>
            <button type="submit" name="add">Lưu</button>
        </div>
    </form>
</div>