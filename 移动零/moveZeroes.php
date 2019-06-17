<?php
/**
给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
示例:
输入: [0,1,0,3,12]
输出: [1,3,12,0,0]
 */

// 第一种方式
function moveZeroes(&$nums)
{
    $i = 0;
    foreach ($nums as $key => $value) {
        if ($value == 0) {
            $i++;
            unset($nums[$key]);
        }
    }
    $nums = array_values($nums);
    if ($i) {
        $len = count($nums) - 1;
        for ($j = 1; $j <= $i; $j++) {
            $nums[$len + $j] = 0;
        }
    }
    return $nums;
}

// 第二种方式，使用 PHP 函数多一点的
function moveZeroes1(&$nums)
{
    // 原来的数字个数
    $oldLen = count($nums);
    $nums   = array_values(array_filter($nums));
    // 去除零之后的个数
    $newLen = count($nums);
    // 看看有几个零
    $i = $oldLen - $newLen;
    if ($i) {
        for ($j = 0; $j < $i; $j++) {
            // 追加进去
            $nums[$newLen + $j] = 0;
        }
    }
    return $nums;
}
// 第三种方式，使用 快速排序的 思想. 执行时间最长
function moveZeroes2(&$nums)
{
    // 计算数组的长度
    $len = count($nums);
    if ($len == 0 || $len == 1) {
        return;
    }
    for ($i = 0; $i < $len; $i++) {
        if ($nums[$i] == 0) {
            $j    = $i + 1;
            $flag = true;
            while ($flag && $j <= $len) {
                if ($nums[$j] != 0) {
                    $temp     = $nums[$i];
                    $nums[$i] = $nums[$j];
                    $nums[$j] = $temp;
                    $flag     = false;
                }
                $j++;
            }
        }
    }
    return $nums;
}
$nums = [0, 1, 0, 3, 12];
print_r(ooo($nums));
