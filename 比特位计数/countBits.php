<?php

class Solution
{
    /**
     * @param Integer $num
     * @return Integer[]
     */
    function countBits($num)
    {
        $res = [$num + 1 => 0];
        for ($i = 1; $i <= $num; $i++) {
            $res[$i] = $res[$i & ($i - 1)] + 1;
        }
        return $res;
    }

    function countBits1($num)
    {
        $arr[0] = 0;
        for ($i = 1; $i <= $num; $i++) {
            $arr[$i] = $arr[$i >> 1] + ($i & 1);
        }
        return $arr;
    }

    /**
     * DP 方程
     * F(0) = 0 , N = 0
     * F(N) = F(N/2) + N%2 , N > 0
     */
    function countBits2($num)
    {
        $res[] = 0;
        for ($i = 1; $i <= $num; $i++) {
            $res[$i] = $res[(int)$i / 2] + $i % 2;
        }
        return $res;
    }

}

// 会有 notice 的提示数据，数组的偏移量问题
$solution = new Solution();
$num = 2;
//var_dump($solution->countBits($num));
//var_dump($solution->countBits1($num));
var_dump($solution->countBits2($num));