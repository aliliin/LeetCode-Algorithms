<?php


class Solution
{

    function ladderLength($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) return 0;
        // 数组中的键和值交换一下
        $newWordList = array_flip($wordList);
        $s1[] = $beginWord;
        $s2[] = $endWord;
        $n = strlen($beginWord);
        $step = 0;
        while (!empty($s1)) {
            $step++;
            // 依次双向 BFS 实现，始终使用变量 s1 去运算
            if (count($s1) > count($s2)) {
                $temp = $s1;
                $s1 = $s2;
                $s2 = $temp;
            }
            $s = [];
            foreach ($s1 as $word) {
                for ($i = 0; $i < $n; $i++) {
                    $word1 = $word;
                    for ($ch = ord('a'); $ch <= ord('z'); $ch++) {
                        $word1[$i] = chr($ch);
                        if (in_array($word1, $s2)) return $step + 1;
                        if (!array_key_exists($word1, $newWordList)) continue;
                        unset($newWordList[$word1]);
                        $s[] = $word1;
                    }
                }
            }
            $s1 = $s;
        }
        return 0;
    }

    /**
     * bfs
     * 一个简单的广度优先搜索迭代实现。
     * 1.从一个节点开始，将其加入队列并标记为已访问。
     * 2.在队列上有节点时执行此操作：
     *   *a 使下一个节点出队。
     *   *b。如果这是我们想要的，则返回true！
     *   *C。搜索邻居，如果还没有去过的话，
     *   *将它们添加到队列中并标记为已访问。
     * 3.如果找不到节点，则返回 false。
     */
    function bfs($graph, $start, $end)
    {
        $queue = new SplQueue();
        $queue->enqueue($queue); // 向队列添加元素
        $visited = [$start];
        while ($queue->count() > 0) {
            $node = $queue->dequeue(); // 从队列中取出节点
            // 找到了我们想要的
            if ($node === $end) {
                return true;
            }
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
                    $queue->enqueue($neighbour);
                }
            };
        }
        return false;
    }

    // 与bfs（）相同，只不过它返回路径而不是返回布尔值。
    function bfs_path($graph, $start, $end)
    {
        $queue = new SplQueue();
        # Enqueue the path
        $queue->enqueue([$start]);
        $visited = [$start];
        while ($queue->count() > 0) {
            $path = $queue->dequeue();
            # Get the last node on the path
            # so we can check if we're at the end
            $node = $path[sizeof($path) - 1];

            if ($node === $end) {
                return $path;
            }
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
                    # Build new path appending the neighbour then and enqueue it
                    $new_path = $path;
                    $new_path[] = $neighbour;
                    $queue->enqueue($new_path);
                }
            };
        }
        return false;
    }

    // dfs
    function dfs($graph, $currentKey)
    {
        $explore = [];
        $explore[$currentKey] = 1;
        foreach ($graph[$currentKey] as $nodeKey => $isVertex) {
            if ($isVertex && !isset($explore[$nodeKey])) {
                $this->dfs($graph, $nodeKey);
            }
        }
    }
}
$Solution = new Solution();
$beginWord = "hit";
$endWord = "cog";
$wordList = ["hot", "dot", "dog", "lot", "log", "cog"];

$beginWord = "hot";
$endWord = "dog";
$wordList = ["hot", "dog", "dot"];

print_r($Solution->ladderLength($beginWord, $endWord, $wordList));