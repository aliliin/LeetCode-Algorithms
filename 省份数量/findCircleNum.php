<?php

// 输入：isConnected = [[1,1,0],[1,1,0],[0,0,1]]
// 输出：2

$m = [[1, 1, 0], [1, 1, 0], [0, 0, 1]];
var_dump(findCircleNum($m));
var_dump(findCircleNum1($m));


// 广度优先
function findCircleNum1($m)
{
    $count = 0;
    $vis = array_fill(0, sizeof($m), 0);
    $queue = [];
    for ($i = 0; $i < sizeof($m); $i++) {
        if ($vis[$i] == 0) {
            array_push($queue, $i);
            while (!empty($queue)) {
                $s = array_shift($queue); //出队
                $vis[$s] = 1;
                for ($j = 0; $j < sizeof($m); $j++) {
                    if ($m[$s][$j] == 1 && $vis[$j] == 0) {
                        array_push($queue, $j); //元素入队-继续搜索
                    }
                }
            }
            $count++;
        }
    }
    return $count;
}


function findCircleNum($m)
{
    $count = 0;
    $vis = array_fill(0, sizeof($m), 0);
    foreach ($m as $i => $v) {
        if ($vis[$i] == 0) {
            dfs($m, $vis, $i);
            $count++;
        }
    }
    return $count;
}
// 深度优先 dfs
function dfs($m, &$vis, $i)
{
    for ($j = 0; $j < sizeof($m); $j++) {
        if ($m[$i][$j] == 1 && $vis[$j] == 0) {
            $vis[$j] = 1;
            dfs($m, $vis, $j);
        }
    }
}
