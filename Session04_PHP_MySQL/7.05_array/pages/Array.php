<?php
    $array = [];
    $sum = "";
    $average = "";
    $min = "";
    $max = "";
    
    if (isset($_POST['calculate-array'])) {
        $array = $_POST['array'];

        if (!empty($array)) {
            $sum = array_sum($array);
            $average = $sum / count($array);
            $min = min($array);
            $max = max($array);
        }
    }  

?>
<div id="center">
    <div>
        <h2>Thao tác trên mảng 1 chiều</h2>
        <p>Bài toán: Nhập vào chuỗi số: tính tổng các số, giá trị trung bình, tìm min, max, trung bình cộng</p>
    </div>
    <form action="" method="post">
        <div>
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <input class="input-field" type="number" name="array[]" value="<?php echo $array[$i]; ?>" required>
            <?php } ?>
        </div>
        <div>
            <button type="reset" name="reset-array">Reset</button>
            <button type="submit" name="calculate-array">Calculate</button>
        </div>
    </form>
    <br><br>
    <div>
        <?php if (isset($_POST['calculate-array'])) { ?>
        <h2>Kết quả</h2>
        <p>Tổng: <span><?php echo $sum;?></span></p>
        <p>Trung bình: <span><?php echo $average;?></span></p>
        <p>Min: <span><?php echo $min;?></span></p>
        <p>Max: <span><?php echo $max;?></span></p>
        <?php } ?>
    </div>
</div>