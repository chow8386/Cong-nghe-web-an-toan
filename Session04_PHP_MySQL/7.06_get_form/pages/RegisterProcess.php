<?php
    $username = '';
    $password = '';
    $gender = '';
    $address = '';
    $languages = [];
    $skill_level = '';
    $marriage_status = '';
    $note = '';

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        
        $languages = isset($_POST['language']) ? $_POST['language'] : array();

        $skill_level = $_POST['skill'];

        $marriage_status = isset($_POST['marriage-status']) ? 'Đã kết hôn' : 'Chưa kết hôn';

        $note = $_POST['note'];
    }
?>
<div id="center">
    <h2>Form Đăng Ký</h2>
    <div class="row">
        <label>Username:</label>
        <span><?php echo $username;?></span>
    </div>
    <div class="row">
        <label>Password:</label>
        <span><?php echo $password;?></span>
    </div>
    <div class="row">
        <label>Gender:</label>
        <span><?php echo $gender;?></span>
    </div>
    <div class="row">
        <label>Address:</label>
        <span><?php echo $address;?></span>
    </div>
    <div class="row">
        <label>Enable Programming Language:</label>
        <span><?php echo implode(", ", $languages);?></span>
    </div>
    <div class="row">
        <label>Skill:</label>
        <span><?php echo $skill_level;?></span>
    </div>
    <div class="row">
        <label>Note:</label>
        <span><?php echo $note;?></span>
    </div>
    <div class="row">
        <label>Marriage Status:</label>
        <span><?php echo $marriage_status;?></span>
    </div>
</div>