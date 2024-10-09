<?php
    $username = '';
    $gender = '';
    $address = '';
    $languages = [];
    $note = '';
    $form_submitted = false;

    if (isset($_POST['register-contact'])) {
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $form_submitted = true;
    }
?>

<div id="center">
    <?php if (!$form_submitted) { ?>
    <form action="" method="POST">
        <h2>Form Liên Hệ</h2>
        <div>
        <div class="row">
            <label>Username:</label>
            <div class="input-group">
            <input class="input-field" type="text" name="username" required>
            </div>
        </div>

        <div class="row">
            <label>Gender:</label>
            <div class="input-group">
            <input type="radio" name="gender" value="Male" required> Male <br>
            <input type="radio" name="gender" value="Female" required> Female
            </div>
        </div>

        <div class="row">
            <label>Address:</label>
            <div class="input-group">
            <select name="address" required>  
                <option value="Hà Nội">Hà Nội</option>  
                <option value="TP HCM">TP HCM</option>  
                <option value="Huế">Huế</option>  <br>
                <option value="Đà Nẵng">Đà Nẵng</option>  
            </select> 
            </div>
        </div>

        <div class="row">
            <label>Note:</label>
            <div class="input-group">
            <textarea class="" name="note" rows="3" cols="40"></textarea>
            </div>
        </div>

        <div class="align-center">
            <button type="reset" name="reset-contact">Reset</button>
            <button type="submit" name="register-contact">Contact</button>
        </div>
        </div>
    </form>
    <?php } ?>
    
    <?php if ($form_submitted) { ?>
    <form action="">
        <h2>Thông tin liên hệ</h2>
        <div class="row">
            <label>Username:</label>
            <span><?php echo $username;?></span>
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
            <label>Note:</label>
            <span><?php echo $note;?></span>
        </div>
    </form>
    <?php } ?>
</div>
