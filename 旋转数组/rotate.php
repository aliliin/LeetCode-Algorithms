<?php

$nums = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
//$nums = [1, 2];s
$Solution = new  Solution();
//var_dump($Solution->rotate($nums, $k));
var_dump($Solution->rotate2($nums, $k));

var_dump($Solution->rotate1($nums, $k));


class Solution
{
    // 超出时间限制
//    function rotate(&$nums, $k)
//    {
//        if ($k == 0) return $nums;
//        $len = count($nums);
//        for ($i = 0; $i < $k; $i++) {
//            $end = $nums[$len - 1];
//            foreach ($nums as $key => $num) {
//                $temp = $num;
//                $nums[$key] = $end;
//                $end = $temp;
//            }
//        }
//    }

    function rotate2(&$nums, $k)
    {
        $k = $k % count($nums);//取余防止k>nums的长度
        $nums = array_merge(array_splice($nums, -1 * $k, $k), $nums);
    }

    function rotate3(&$nums, $k)
    {
        array_unshift($nums, ...array_splice($nums, count($nums) - $k));
    }

    function rotate1(&$nums, $k)
    {
        $new = [];
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($k >= $len) {
                $k = $k - $len;
            }
            if (($i + $k) > ($len - 1)) {
                $index = ($i + $k) - ($len - 1) - 1;
            } else {
                $index = $i + $k;
            }
            $new[$index] = $nums[$i];
        }
        ksort($new);
        $nums = $new;
        return $nums;
    }


}