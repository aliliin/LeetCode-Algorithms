<?php

class Solution
{

    /**
     *
     * dp 动态规划的写法
     * 状态定义： dp[i]:从头到第 i 个元素，最长子序列的元素
     * 方式：    max(dp[0],dp[1].....dp[n-1])
     */
    function lengthOfLIS($nums)
    {
        $length = count($nums);
        if (empty($nums) || $length == 0) return 0;
        $res = 1;
        // 先定义好固定大小的数组 PHP 也可以先固定好。防止越界报错
        for ($k = 0; $k < $length; ++$k) $dp[$k] = 1;
        for ($i = 1; $i < $length; ++$i) {
            for ($j = 0; $j < $i; ++$j) {
                // 只要 $j 小于 $i  $i就可以利用之前组建好的结果进行上升
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
            $res = max($res, $dp[$i]);
        }
        return $res;
    }

    /**
     * 二分查找
     */
    function lengthOfLIS1($nums)
    {
        if (empty($nums)) return 0;
        $res = 0;
        $tails = [];
        foreach ($nums as $num) {
            $i = 0;
            $j = $res;
            // 二分查找
            while ($i < $j) {
                $m = intval(($i + $j) / 2);
                if ($tails[$m] < $num) {
                    $i = $m + 1;
                } else {
                    $j = $m;
                }
            }
            $tails[$i] = $num;
            if ($res == $j) $res++;
        }
        return $res;
    }

    function lengthOfLIS2($nums)
    {
        if (empty($nums)) return 0;
        $res = 0;
        $tails = [];
        for ($i = 0; $i < count($nums); $i++) {
            $k = 0;
            $j = $res;
            while ($k < $j) {
                $m = intval(($k + $j) / 2);
                if ($tails[$m] < $nums[$i]) {
                    $k = $m + 1;
                } else {
                    $j = $m;
                }
            }
            $tails[$k] = $nums[$i];
            if ($res == $j) $res++;
        }
        return $res;
    }
}

$Solution = new Solution();
$nums = [10, 9, 2, 5, 3, 7, 101, 18];
echo $Solution->lengthOfLIS($nums);
echo $Solution->lengthOfLIS1($nums);
echo $Solution->lengthOfLIS2($nums);

