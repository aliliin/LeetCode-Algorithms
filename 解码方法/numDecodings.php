<?php

// 解码方法


$s = 101;
// 输入: "10"
// 输出: 2
$Solution = new Solution();
var_dump($Solution->numDecodings($s)); // 2
var_dump($Solution->numDecodings2($s)); // 2


class Solution
{
    // 动态规划
    function numDecodings($s)
    {
        $s = str_split($s);
        if ($s[0]  == 0) return 0;
        // dp[-1] = dp[0] = 1
        $pre = 1;
        $curr = 1;
        for ($i = 1; $i < count($s); $i++) {
            $temp = $curr;
            if ($s[$i] == 0) {
                if ($s[$i - 1] == 1 || $s[$i - 1] == 2) {
                    $curr = $pre;
                } else {
                    return 0;
                }
            } elseif ($s[$i - 1] == 1 || ($s[$i - 1] == 2 && $s[$i] >= 1 && $s[$i] <= 6)) {
                $curr = $curr + $pre;
            }
            $pre = $temp;
        }
        return $curr;
    }
    function numDecodings2($s)
    {
        if (strlen($s) == 0 || $s == null) return 0;
        $len = strlen($s);
        $s = str_split($s);
        $help = 1;
        $res = 0;
        if ($s[$len - 1] != '0') $res = 1;

        for ($i = $len - 2; $i >= 0; $i--) {
            if ($s[$i] == '0') {
                $help = $res;
                $res = 0;
                continue;
            }
            if (($s[$i] - '0') * 10 + ($s[$i + 1] - 0) <= 26) {
                $res += $help;
                // help 用来存储之前的 res 的值
                $help = $res - $help;
            } else {
                $help = $res;
            }
        }
        return $res;
    }
}
