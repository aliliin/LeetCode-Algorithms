<?php

// 最大正方形

function maximalSquare($matrix)
{
    if (empty($matrix) || count($matrix[0]) == 0)  return 0;
    $maxSide = 0; //最大结果值
    $rows = count($matrix); // 行
    $columns = count($matrix[0]); // 列

    $dp = []; // 生成一个同等规模的数组
    for ($r = 0; $r < $rows; $r++) {
        for ($c = 0; $c < $columns; $c++) {
            $dp[$r][$c] = 0;
        }
    }
    // 动态规划公式  dp(i,j)=min(dp(i−1,j),dp(i−1,j−1),dp(i,j−1))+1
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($matrix[$i][$j] == '1') {
                if ($i == 0 || $j == 0) {
                    $dp[$i][$j] = 1;
                } else {
                    $min = array($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]);
                    $dp[$i][$j] = min($min) + 1;
                }
                $maxSide = max($maxSide, $dp[$i][$j]);
            }
        }
    }
    return $maxSide * $maxSide;
}

$matrix = [
    ["1", "0", "1", "0", "0"],
    ["1", "0", "1", "1", "1"],
    ["1", "1", "1", "1", "1"],
    ["1", "0", "0", "1", "0"]
];
var_dump(maximalSquare($matrix));
