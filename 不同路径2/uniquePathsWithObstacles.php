<?php
// 不同路径 2

$Solution = new Solution();

$obstacleGrid = [
    [0, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
];

print_r($Solution->uniquePathsWithObstacles($obstacleGrid)); // 输出 2
print_r($Solution->uniquePathsWithObstacles1($obstacleGrid)); // 输出 2


class Solution
{
    // 动态规划
    function uniquePathsWithObstacles($obstacleGrid)
    {
        // 行
        $n = count($obstacleGrid);
        // 列
        $m = count($obstacleGrid[0]);
        $res = [0];
        $res = array_pad($res, $m, 0);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($i == 0 && $j == 0) {
                    $res[$j] = 1;
                }
                if ($obstacleGrid[$i][$j] == 1) {
                    $res[$j] = 0;
                } elseif ($j > 0) {
                    $res[$j] += $res[$j - 1];
                }
            }
        }
        return $res[$m - 1];
    }

    // 动态规划
    function uniquePathsWithObstacles1($obstacleGrid)
    {
        // 行
        $n = count($obstacleGrid);
        // 列
        $m = count($obstacleGrid[0]);
        $res = [0];
        $res = array_pad($res, $m, 0);
        $res[0] = 1;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $res[$j] = 0;
                } elseif ($j > 0) {
                    $res[$j] += $res[$j - 1];
                }
            }
        }
        return $res[$m - 1];
    }
}
