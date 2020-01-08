<?php
// 不同路径

$Solution = new Solution();
$m = 3;
$n = 2;

print_r($Solution->uniquePaths($m, $n));
print_r($Solution->uniquePaths1($m, $n));


class Solution
{
    // 动态规划
    // 二唯数组
    function uniquePaths1($m, $n)
    {
        $res = [];
        for ($i = 0; $i < $m; $i++) {
            $res[$i][0] = 1;
        }
        for ($i = 0; $i < $n; $i++) {
            $res[0][$i] = 1;
        }
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $res[$i][$j] = $res[$i - 1][$j] + $res[$i][$j - 1];
            }
        }
        return $res[$m - 1][$n - 1];
    }

    // 一唯数组
    function uniquePaths($m, $n)
    {

        $res = [1];
        $res = array_pad($res, $n, 1);
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $res[$j] += $res[$j - 1];
            }
        }
        return $res[$n - 1];
    }
}
