<?php

$points = [[0, 0], [2, 2], [3, 10], [5, 2], [7, 0]];
// 20 
var_dump(minCostConnectPoints($points));
$points = [[3,12],[-2,5],[-4,1]];
// 输出：18
var_dump(minCostConnectPoints($points));

function minCostConnectPoints($points)
{
    //如果点数量小于2个，直接返回
    if (count($points) < 2) return 0;

    $res = 0;
    $list = [];

    //先取出第一个节点作为目标节点
    $index = 0;
    $point = $points[$index];
    unset($points[$index]);

    while ($points) {
        $minDis = PHP_INT_MAX;

        //挨个遍历节点集合，计算跟目标节点的曼哈顿距离
        foreach ($points as $k => $p) {
            $len = abs($point[0] - $p[0]) + abs($point[1] - $p[1]);

            //如果k节点离目标节点更近，则更新其距离记录
            $list[$k] = min($list[$k] ?? PHP_INT_MAX, $len);

            //遍历过程逐步确定剩下节点中，哪个距离最小树最近，将其索引记录下来，添加到最小树之内，作为下一轮遍历的目标节点
            if ($minDis >= $list[$k]) {
                $minDis = $list[$k];
                $index = $k;
            }
        }

        //本轮遍历结束，找到一个距离最小树最近的节点，将其距离记录下来，并添加到最小树上
        $res += $minDis;
        $point = $points[$index];
        unset($points[$index]);
    }
    
    return $res;
}
