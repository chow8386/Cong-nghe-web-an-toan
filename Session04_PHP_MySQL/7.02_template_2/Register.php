<?php
    include 'templates/Head.php';
    include 'templates/Left.php';

    $name = "";
    $address = "";
    $job = "";
    $note = "";

    if (isset($_POST['register'])) {
      $name = htmlspecialchars($_POST['name']);
      $address = htmlspecialchars($_POST['address']);
      $job = htmlspecialchars($_POST['job']);
      $note = htmlspecialchars($_POST['note']);
    }
?>

<div id="center">
  <h2 class="align-center">Form Đăng Ký</h2>
  <form action="" method="POST">
    <div>
      <div class="row">
        <label for="name">Tên:</label>
        <input class="input-field" type="text" name="name" value="<?php echo $name;?>" required>
      </div>
      <div class="row">
        <label for="address">Địa chỉ:</label>
        <input class="input-field" type="text" name="address" value="<?php echo $address;?>" required>
      </div>
      <div class="row">
        <label for="job">Nghề:</label>
        <input class="input-field" type="text" name="job" value="<?php echo $job;?>" required>
      </div>
      <div class="row">
        <label for="note">Ghi chú:</label>
        <textarea class="input-field" name="note" rows="3" cols="25"></textarea>
      </div>
      <div class="align-center">
        <button type="reset" name="clear">Xóa</button>
        <button type="submit" name="register">Đăng Ký</button>
      </div>
    </div>
  </form>
  <?php
    if (isset($_POST['register'])) {      
      session_start();
      $_SESSION['name'] = $name;
      $_SESSION['address'] = $address;
      $_SESSION['job'] = $job;
      $_SESSION['note'] = $note;

      header("Location: ResultRegister.php");
      exit();
    }
  ?>
</div>

<?php
    include 'templates/Footer.php';
?>