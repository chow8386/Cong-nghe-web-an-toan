<?php
    $name = "";
    $class = "";
    $score1 = "";
    $score2 = "";
    $score3 = "";
    
    if (isset($_POST['calc'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $class = isset($_POST['class']) ? $_POST['class'] : "";
        $score1 = isset($_POST['score1']) ? $_POST['score1'] : "";
        $score2 = isset($_POST['score2']) ? $_POST['score2'] : "";
        $score3 = isset($_POST['score3']) ? $_POST['score3'] : "";
        $sum = $score1 + $score2 + $score3;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Score</title>
    <style>
        .container {
            width: 300px;
            margin: auto;
            margin-top: 40px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }
        
        .input-field {
            margin: 0 0 10px 10px;
        }

        .center {
            text-align: center;
        }

        button {
            padding: 5px;
            margin: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <label>Họ và tên: </label>
                <input class="input-field" type="text" name="name" value="<?php echo $name;?>" required>
            </div>
            <div class="row">
                <label>Lớp: </label>
                <input class="input-field" type="text" name="class" value="<?php echo $class;?>" required>
            </div>
            <div class="row">
                <label>Điểm M1: </label>
                <input class="input-field" type="number" name="score1" value="<?php echo $score1;?>" required>
            </div>
            <div class="row">
                <label>Điểm M2: </label>
                <input class="input-field" type="number" name="score2" value="<?php echo $score2;?>" required>
            </div>
            <div class="row">
                <label>Điểm M3: </label>
                <input class="input-field" type="number" name="score3" value="<?php echo $score3;?>" required>
            </div>
            <div class="row">
                <label>Tổng điểm: </label>
                <input class="input-field" type="number" value="<?php echo $sum;?>">
            </div>
            <div class="center">
                <button type="reset" name="calc">OK</button>
                <button type="submit" name="clear">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
