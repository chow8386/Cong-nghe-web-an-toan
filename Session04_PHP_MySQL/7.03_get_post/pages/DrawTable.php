<?php
    $rows = "";
    $cols = "";

    if (isset($_POST['draw'])) {
        $rows = $_POST['row'];
        $cols = $_POST['col'];
    }
?>
<div id="center">
    <form action="" method="POST">
        <div class="form-draw">
            <h2 class="align-center">Form vẽ bảng</h2>
            <div class="row">
                <label for="row">Số dòng:</label>
                <input class="input-field" type="text" name="row" value="<?php echo $rows;?>">
            </div>
            <div class="row">
                <label for="col">Số cột:</label>
                <input class="input-field" type="text" name="col" value="<?php echo $cols;?>">
            </div>
            <div class="align-center">
                <button type="reset" name="clear">Nhập lại</button>
                <button type="submit" name="draw">Vẽ</button>
            </div>
        </div>
    </form>
    <br>
  
    <?php
        if (isset($_POST['draw'])) {
            echo "<table>";
            for ($i = 1; $i <= $rows; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $cols; $j++) {
                    if ($j <= $i) {
                        echo "<td>" . $j . "</td>";
                    } else {
                        echo "<td> </td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</div>