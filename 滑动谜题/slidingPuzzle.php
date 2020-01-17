<?php
// 滑动谜题

$board = [[1, 2, 3], [4, 0, 5]]; // 1
$board = [[4, 1, 2], [5, 0, 3]];
$Solution = new Solution();
var_dump($Solution->slidingPuzzle($board));


class Solution
{

    /**
     * 1.dfs
     * 2.bfs 更快找到最优解
     * 3.a*
     */

    // 方向变换向量，类似 4连通图 8连通图
    public $moves = [
        0 => [1, 3],
        1 => [0, 2, 4],
        2 => [1, 5],
        3 => [0, 4],
        4 => [1, 3, 5],
        5 => [2, 4],
    ];
    // bfs
    function slidingPuzzle($board)
    {
        $moves = [[1, 3], [0, 2, 4], [1, 5], [0, 4], [1, 3, 5], [2, 4]];
        $target = "123450";
        $start  = '';
        foreach ($board as $b) {
            foreach ($b as $v) {
                $start .= $v;
            }
        }
        $visited[] = $start;
        $queue = new SplQueue();
        $queue->enqueue($start);
        $res = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $curr = $queue->dequeue();
                if ($curr == $target)  return $res;
                $zero = strpos($curr, '0');
                foreach ($moves[$zero] as $move) {
                    $newArr = $curr;
                    $temp = $newArr[$move];
                    $newArr[$move] = $newArr[$zero];
                    $newArr[$zero] = $temp;
                    if (!in_array($newArr, $visited)) {
                        $visited[] = $newArr;
                        $queue->enqueue($newArr);
                    }
                }
            }
            var_dump($queue);
            $res += 1;
        }
        return -1;
    }
}
