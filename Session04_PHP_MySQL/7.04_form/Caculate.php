<?php 
    $num1 = "";
    $num = "";
    $result ="";
    $operation = "";
    if (isset($_POST['calculate'])) 
    {
        $num1 = $_POST['number1'];
        $num2 = $_POST['number2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Cannot divide by zero';
                }
                break;
            default:
                $result = 'Invalid operation';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate</title>
    <style>
        table, tr, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 10px;
        }

        h2 {
            text-align: center;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h2 >Nhập 2 số nguyên</h2>
    <form method="POST">
        <table class="center">
            <tr>
                <td></td>
                <td><input type="number" name="number1" value="<?php echo $num1;?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="number" name="number2" value="<?php echo $num2;?>"  required></td>
            </tr>
            <tr>
                <td>Phép tính</td>
                <td>
                    <label>
                        <input type="radio" name="operation" value="+" <?php if ($operation == '+') echo 'checked'; ?>> +
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="operation" value="-" <?php if ($operation == '-') echo 'checked'; ?>> -
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="operation" value="*" <?php if ($operation == '*') echo 'checked'; ?>> *
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="operation" value="/" <?php if ($operation == '/') echo 'checked'; ?>> /
                    </label>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="reset" name="calculate">Calculate</button>
                    <button type="submit" name="reset">Reset</button>
                </td>
            </tr>
            <tr>
                <td>Kết quả</td>
                <td><?php echo $result;?></td>
            </tr>
        </table>
    </form>
</body>
</html>