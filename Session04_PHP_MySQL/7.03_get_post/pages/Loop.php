<?php
    $rows = "";
    if (isset($_POST['loop'])) {
        $rows = $_POST['row'];
    }
?>
<div id="center">
    <form action="" method="POST">
        <div class="form-draw">
            <div class="row">
                <label for="row">Số dòng:</label>
                <input class="input-field" type="text" name="row" value="<?php echo $rows;?>">
            </div>
            <div class="align-center">
                <button type="submit" name="loop">Loop</button>
            </div>
        </div>
    </form>
    <br>
  
    <?php
        if (isset($_POST['loop'])) {
            $rows = $_POST['row'];
            echo "Sử dụng FOR <br>";
            for ($i = 1; $i <= $rows; $i++) 
            {
                for ($j = 1; $j <= $i; $j++)
                {
                    echo "*";
                }
                echo "<br>";
            }
            echo "Sử dụng WHILE <br>";
            $i = 1;
            while ($i <= $rows) 
            {
                $j = 1;
                while ($j <= $i) 
                {
                    echo "*";
                    $j++;
                }
                echo "<br>";
                $i++;
            }
            echo "Sử dụng DO WHILE <br>";
            $i = 1;
            do 
            {
                $j = 1;
                do 
                {
                    echo "*";
                    $j++;
                } while ($j <= $i);
                echo "<br>";
                $i++;
            } while ($i <= $rows);
        }
    ?>
</div>