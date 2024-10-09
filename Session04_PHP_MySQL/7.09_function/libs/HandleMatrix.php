<?php
    function maxMatrix (array $matrix)
    {
        $max = PHP_INT_MIN;
        foreach ($matrix as $row) {
            foreach ($row as $value) {
                if ($value >= $max) {
                    $max = $value;
                }
            }
        }
        return $max;
    }

    function minMatrix (array $matrix)
    {
        $min = PHP_INT_MAX;
        foreach ($matrix as $row) {
            foreach ($row as $value) {
                if ($value <= $min) {
                    $min = $value;
                }
            }
        }
        return $min;
    }

    function sumMainDiagonal (array $matrix)
    {
        $sum = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix); $j++) {
                if ($i == $j) {
                    $sum += $matrix[$i][$j];
                }
            }
        }
        return $sum;
    }

    function sumSubDiagonal (array $matrix)
    {
        $sum = 0;
        $n = count($matrix);
        for ($i = 0; $i < $n; $i++) {
            $sum += $matrix[$i][$n - $i - 1];
        }
        return $sum;
    }

    function printArray (array $matrix)
    {
        foreach ($matrix as $row) { 
            foreach ($row as $val) {
                echo $val . str_repeat('&nbsp;', 5);
            }
            echo "<br>";
        }
    }

    function sumMatrix (array $matrix1, array $matrix2)
    {
        $sumMatrix = [];
        $size = count($matrix1);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $sumMatrix[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
            }
        }
        return $sumMatrix;
    }

    function subMatrix (array $matrix1, array $matrix2)
    {
        $subMatrix = [];
        $size = count($matrix1);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $subMatrix[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
            }
        }
        return $subMatrix;
    }

    function mulMatrix (array $matrix1, array $matrix2)
    {
        $subMatrix = [];
        $size = count($matrix1);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $mulMatrix[$i][$j] = 0;
                for ($k = 0; $k < $size; $k++) {
                    $mulMatrix[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
                }
            }
        }
        return $mulMatrix;
    }
?>