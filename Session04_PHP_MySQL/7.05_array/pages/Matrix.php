<?php
    $size = "";
    $matrix1 = $matrix2 = [];
    $sumMatrix = $subMatrix = $mulMatrix = [];

    if (isset($_POST['set_size'])) {
        $size = isset($_POST['size']) ? (int) $_POST['size'] : 0;
    }

    if (isset($_POST['calculate-matrix'])) {
        $size = $_POST['size'];

        if ($size > 0) {
            $matrix1 = array_chunk($_POST['matrix1'], $size);
            $matrix2 = array_chunk($_POST['matrix2'], $size);

            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    $sumMatrix[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
                    $subMatrix[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
                }
            }

            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    $mulMatrix[$i][$j] = 0;
                    for ($k = 0; $k < $size; $k++) {
                        $mulMatrix[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
                    }
                }
            }
        }
    }

?>

<div id="center">
    <div>
        <h2>Thao tác trên mảng 2 chiều</h2>
        <p>Bài toán: Tính tổng, hiệu, tích 2 ma trận</p>
    </div>
    <form action="" method="post">
        <div>
            Nhập kích thước ma trận: 
            <input class="input-field" type="number" name="size" value="<?php echo $size;?>" min="1" required>
            <button type="submit" name="set_size">Chọn</button>
        </div>
    </form>
    <?php if ($size > 0) { ?>
    <form action="" method="post">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <div class="container-matrix">
            <div>
                <p>Nhập Ma trận 1</p>
                <?php for ($i = 0; $i < $size; $i++) { ?>
                        <?php for ($j = 0; $j < $size; $j++) { ?>
                            <input class="input-field" type="number" name="matrix1[]" value="<?php echo $matrix1[$i][$j]; ?>" required>
                        <?php } ?>
                        <br>
                <?php } ?>
            </div>
            <div>
                <p>Nhập Ma trận 2</p>
                <?php for ($i = 0; $i < $size; $i++) { ?>
                        <?php for ($j = 0; $j < $size; $j++) { ?>
                            <input class="input-field" type="number" name="matrix2[]" value="<?php echo $matrix2[$i][$j]; ?>" required>
                        <?php } ?>
                        <br>
                <?php } ?>
            </div>
        </div>
        
        <div class="align-center">
            <button type="reset" name="reset-matrix">Reset</button>
            <button type="submit" name="calculate-matrix">Calculate</button>
        </div>
    </form>
    <?php } ?>
    <br>
    <div>
        <?php if (!empty($sumMatrix) || !empty($subMatrix) || !empty($mulMatrix)){ ?>
            <h2>Kết quả</h2>

            <p>Tổng:</p>
            <?php foreach ($sumMatrix as $row) { ?>
                <?php foreach ($row as $val) {
                    echo $val . str_repeat('&nbsp;', 5);
                } ?>
                <br>
            <?php } ?>

            <p>Hiệu:</p>
            <?php foreach ($subMatrix as $row) { ?>
                <?php foreach ($row as $val) {
                    echo $val . str_repeat('&nbsp;', 5);
                } ?>
                <br>
            <?php } ?>

            <p>Tích:</p>
            <?php foreach ($mulMatrix as $row) { ?>
                <?php foreach ($row as $val) {
                    echo $val . str_repeat('&nbsp;', 5);
                } ?>
                <br>
            <?php } ?>

        <?php } ?>
    </div>
</div>