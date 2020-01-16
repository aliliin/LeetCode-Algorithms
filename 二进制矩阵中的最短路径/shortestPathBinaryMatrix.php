<?php
// 二进制矩阵中的最短路径

$grid = [[0, 0, 0], [1, 1, 0], [1, 1, 0]];
$Solution = new Solution();
var_dump($Solution->shortestPathBinaryMatrix1($grid));
class Solution
{

    /*
    * A*
    */
    function shortestPathBinaryMatrix($grid)
    {

    }

    /**
     * 2.bfs
     */
    function shortestPathBinaryMatrix1($grid)
    {
        $len = sizeof($grid) - 1;
        $queue = [[0, 0]];
        $step = 1;

        while (sizeof($queue) > 0) {
            $copy = $queue;
            $queue = [];
            while (sizeof($copy) > 0) {
                $pos = array_shift($copy);
                if ($pos[0] < 0 || $pos[0] > $len || $pos[1] < 0 || $pos[1] > $len) continue;
                if ($grid[$pos[0]][$pos[1]] === 1) continue;
                if ($pos[0] === $len && $pos[1] === $len) return $step;

                // 8 连通图的走法
                array_push($queue, [$pos[0] + 1, $pos[1]]);
                array_push($queue, [$pos[0] + 1, $pos[1] + 1]);
                array_push($queue, [$pos[0] + 1, $pos[1] - 1]);
                array_push($queue, [$pos[0] - 1, $pos[1]]);
                array_push($queue, [$pos[0] - 1, $pos[1] + 1]);
                array_push($queue, [$pos[0] - 1, $pos[1] - 1]);
                array_push($queue, [$pos[0], $pos[1] + 1]);
                array_push($queue, [$pos[0], $pos[1] - 1]);

                $grid[$pos[0]][$pos[1]] = 1;
            };
            $step++;
        };

        return -1;
    }
}
