<?php

$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
function bubbleSort($arr)
{
    $len = count($arr);
    //该层循环控制 需要冒泡的轮数
    for ($i = 1; $i < $len; $i++) {
        //该层循环用来控制每轮 冒出一个数 需要比较的次数
        for ($k = 0; $k < $len - $i; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp         = $arr[$k + 1]; // 声明一个临时变量
                $arr[$k + 1] = $arr[$k];
                $arr[$k]     = $tmp;
            }
        }
    }
    return $arr;
}

// print_r(bubbleSort($arr));

function bubbleSort1($arr)
{
    $len = count($arr);
    //该层循环控制 需要冒泡的轮数
    for ($i = 1; $i < $len; $i++) {
        //该层循环用来控制每轮 冒出一个数 需要比较的次数
        for ($k = 0; $k < $len - $i; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp         = $arr[$k + 1]; // 声明一个临时变量
                $arr[$k + 1] = $arr[$k];
                $arr[$k]     = $tmp;
            }
        }
    }
    return $arr;
}
// print_r(bubbleSort1($arr));
function bubbleSort2($arr)
{
    $count = count($arr);
    for ($i = 1; $i < $count; $i++) {
        for ($j = 0; $j < $count - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp        = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j]     = $temp;
            }
        }
    }
    return $arr;
}
print_r(bubbleSort2($arr));
