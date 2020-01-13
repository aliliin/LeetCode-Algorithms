<?php

// 最小路径和


$grid = [
    [1, 3, 1],
    [1, 5, 1],
    [4, 2, 1]
];
$Solution = new Solution();
var_dump($Solution->minPathSum($grid)); // 7
var_dump($Solution->minPathSum1($grid)); // 7


class Solution
{


    function minPathSum($grid)
    {
        $lenth = count($grid);
        $lenth1 = count($grid[0]);

        for ($i = 1; $i < $lenth; $i++) {
            $grid[$i][0] += $grid[$i - 1][0];
        }
        for ($i = 1; $i < $lenth1; $i++) {
            $grid[0][$i] += $grid[0][$i - 1];
        }

        for ($i = 1; $i < $lenth; $i++) {
            for ($j = 1; $j < $lenth1; $j++) {
                $grid[$i][$j] += min($grid[$i - 1][$j], $grid[$i][$j - 1]);
            }
        }
        return $grid[$lenth - 1][$lenth1 - 1];
    }


    function minPathSum1($grid)
    {
        $lenth = count($grid);
        $lenth1 = count($grid[0]);
        for ($i = 0; $i < $lenth; $i++) {
            for ($j = 0; $j < $lenth1; $j++) {
                if ($i == 0 && $j == 0) {
                    continue;
                } elseif ($i == 0) {
                    $grid[$i][$j] = $grid[$i][$j - 1] + $grid[$i][$j];
                } elseif ($j == 0) {
                    $grid[$i][$j] = $grid[$i - 1][$j] + $grid[$i][$j];
                } else {
                    $grid[$i][$j] = min($grid[$i - 1][$j], $grid[$i][$j - 1]) + $grid[$i][$j];
                }
            }
        }
        return $grid[$lenth - 1][$lenth1 - 1];
    }
}
