<?php
    function minArray (array $arr) 
    {
        $min = $arr[0];
        for ($i = 0; $i < count($arr); $i++) { 
            if ($arr[$i] <= $min) { 
                $min = $arr[$i]; 
            } 
        } 
        return $min;
    }

    function maxArray (array $arr) 
    {
        $max = $arr[0];
        for ($i = 0; $i < count($arr); $i++) { 
            if ($arr[$i] >= $max) { 
                $max = $arr[$i]; 
            } 
        } 
        return $max;
    }

    function sumArray (array $arr) 
    {
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++) { 
            $sum += $arr[$i]; 
        }
        return $sum;
    }

    function avgArray (array $arr) 
    {
        return sumArray($arr) / count($arr);
    }

    function partition(&$arr, $left, $right)
    {
        $pivot = $arr[floor(($left + $right) / 2)];
        while ($left <= $right) {
            while ($arr[$left] < $pivot)
                $left++;
            while ($arr[$right] > $pivot)
                $right--;
            if ($left <= $right) {
                $tmp = $arr[$left];
                $arr[$left] = $arr[$right];
                $arr[$right] = $tmp;
                $left++;
                $right--;
            }
        }
        return $left;
    }

    function quickSort(&$arr, $left, $right)
    {
        $index = partition($arr, $left, $right);
        if ($left < $index - 1)
            quickSort($arr, $left, $index - 1);
        if ($index < $right)
            quickSort($arr, $index, $right);
    }

    function reverseArray (array $arr) 
    {
        $revArr = [];
        for ($i = 0; $i < count($arr); $i++) { 
            $revArr[$i] = $arr[count($arr) - $i - 1];
        }

        return $revArr;
    }

?>