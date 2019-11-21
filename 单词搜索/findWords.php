<?php

/**

 给定一个二维网格和一个单词，找出该单词是否存在于网格中。

单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母不允许被重复使用。

示例:

board =
[
  ['A','B','C','E'],
  ['S','F','C','S'],
  ['A','D','E','E']
]

给定 word = "ABCCED", 返回 true.
给定 word = "SEE", 返回 true.
给定 word = "ABCB", 返回 false.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/word-search
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                $res = $this->do($board, $i, $j, $word, 0);
                if ($res) {
                    return true;
                }
            }
        }
        return false;
    }

    function do($board, $i, $j, $word, $start)
    {
        // 找到匹配的单词
        if ($start >= strlen($word)) {
            return true;
        }
        // //边界的处判断以及 当前行列对应值是否和匹配的当前位置字符串相等
        if (!empty($board[$i][$j]) && $board[$i][$j] != $word[$start] || $i < 0 || $i >= count($board) || $j < 0 || $j >= count($board[0])) {
            return false;
        }

        $c = $word[$start];
        $board[$i][$j] = "@";
        // 递归调用下一个需要匹配的四个方向行列位置的变化
        $res = ($this->do($board, $i + 1, $j, $word, $start + 1) || $this->do($board, $i - 1, $j, $word, $start + 1)
            || $this->do($board, $i, $j - 1, $word, $start + 1) || $this->do($board, $i, $j + 1, $word, $start + 1));
        $board[$i][$j] = $c;
        return $res;
    }
}

$Trie = new Solution();
$board = [["A", "B", "C", "E"], ["S", "F", "C", "S"], ["A", "D", "E", "E"]];
$word = "ABCCED";
echo $Trie->exist($board, $word);



