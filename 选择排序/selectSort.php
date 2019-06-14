<?php

$array = [3, 2, 5, 4, 6, 9, 7];
function selectSort($array)
{
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        $min = $i; //. 最小元素的下标
        for ($j = $i + 1; $j < $length; $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j; // 找出最小值
            }
        }
        // 交换位置重新赋值
        $temp        = $array[$i];
        $array[$i]   = $array[$min];
        $array[$min] = $temp;
    }
    return $array;
}
print_r(selectSort($array));
