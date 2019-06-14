<?php

// 插入排序，a 表示数组，n 表示数组大小
$a = [3, 4, 5, 1, 7, 2, 8];
$n = count($a);
function insertionSort($a, $n)
{
    if ($n <= 1) {
        return;
    }
    for ($i = 1; $i < $n; ++$i) {
        $value = $a[$i];
        // 查找插入的位置
        for ($j = $i - 1; $j >= 0; --$j) {
            if ($a[$j] > $value) {
                // 数据移动 关键
                $a[$j + 1] = $a[$j];
            } else {
                break;
            }
        }
        $a[$j + 1] = $value; // 插入数据
    }
    return $a;
}
print_r(insertionSort($a, $n));
