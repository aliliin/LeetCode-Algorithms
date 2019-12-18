<?php

$nums1    = [1, 2, 3, 0, 0, 0];
$m        = 3;
$nums2    = [2, 5, 6];
$n        = 3;
$a        = [7, 2, 8, 5, 0, 9, 1, 2, 9, 5, 3, 6, 6, 7, 3, 2, 8, 4, 3, 7, 9, 5, 7, 7, 4, 7, 4, 9, 4, 7, 0, 1, 1, 1, 7, 4, 0, 0, 6];
$Solution = new Solution();
//var_dump($Solution->merge1($nums1, $m, $nums2, $n));
var_dump($Solution->merge2($a));

class Solution
{

    // php 数组函数的解决方式
    public function merge($nums1, $m, $nums2, $n)
    {
        for ($i = $m; $i < count($nums1); $i++) {
            $nums1[$i] = array_shift($nums2);
        }
        sort($nums1);
    }

    public function merge1(&$nums1, $m, $nums2, $n)
    {
        $totallength = ($m--) + ($n--) - 1;
        while ($m >= 0 && $n >= 0) {
            $nums1[$totallength--] = $nums2[$n] > $nums1[$m] ? $nums2[$n--] : $nums1[$m--];
        }
        while ($n >= 0) {
            $nums1[$totallength--] = $nums2[$n--];
        }
    }

    // 双指针 从前往后
    public function merge2(&$nums1, $m, $nums2, $n)
    {
        $nums  = $nums1;
        $nums1 = [];
        $p1    = 0;
        $p2    = 0;
        while ($p1 < $m && $p2 < $n) {
            if ($nums[$p1] < $nums2[$p2]) {
                array_push($nums1, $nums[$p1]);
                $p1 += 1;
            } else {
                array_push($nums1, $nums2[$p2]);
                $p2 += 1;
            }
        }
        if ($p2 < $n) {
            var_dump($nums2);
            var_dump($nums1);
        }
        die;
        var_dump($nums1);
        die;

    }

    public function merge3($digits)
    {
        $size = count($digits);
        for ($i = $size - 1; $i >= 0; $i--) {
            $digits[$i]++;
            $digits[$i] %= 10; // 如果是10那么取余就是0
            if ($digits[$i] != 0) {
// 如果不是等于0 那么就表示，不需要进位
                return $digits;
            }
            // 如果等于0 表明接下来要开始 循环+1进位了  $digits[$i]++;
        }
        // 如果最后 遍历到数组第一位，取余后还不是等于0，那么就特殊处理
        // 开头是1 后面都是0
        $digits[$size] = 0; // 末尾添加0单元
        $digits[0]     = 1; // 首位变1
        return $digits;

    }
}
