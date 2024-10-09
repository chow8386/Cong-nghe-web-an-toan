<?php
    $name = '';
    $address = '';
    $age = '';
    $filename = 'data/student.txt';

    if (isset($_POST['add-student'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $age = $_POST['age'];

        if (!empty($name) && !empty($address) && !empty($age)) {
            $file = fopen($filename, 'a') or die("Unable to open file!");
            if($file) {
                fwrite($file, "\n" . $name . "|");
                fwrite($file, $address . "|");
                fwrite($file, $age);

                echo "<script type='text/javascript'>alert('Add student successfully!');</script>";
            }
            fclose($file);
        }
        else {
            echo "<script type='text/javascript'>alert('Please fill in all fields!');</script>";
        }
    }

?>

<div id="center">
    <h2>Thêm sinh viên</h2>
    <form action="" method="post">
        <div class="row">
            <label>Tên:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="row">
            <label>Địa chỉ:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="row">
            <label>Tuổi:</label>
            <div class="input-group">
            <input class="input-field" type="number" name="age" value="<?php echo $age; ?>">
            </div>
        </div>
        <div>
            <button type="reset" name="reset-add-student">Nhập lại</button>
            <button type="submit" name="add-student">Ghi file</button>
        </div>
    </form>
</div>