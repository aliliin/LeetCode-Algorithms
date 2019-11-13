<?php
/*
 n 皇后问题研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。



上图为 8 皇后问题的一种解法。

给定一个整数 n，返回所有不同的 n 皇后问题的解决方案。

每一种解法包含一个明确的 n 皇后问题的棋子放置方案，该方案中 'Q' 和 '.' 分别代表了皇后和空位。

示例:

输入: 4
输出: [
 [".Q..",  // 解法 1
  "...Q",
  "Q...",
  "..Q."],

 ["..Q.",  // 解法 2
  "Q...",
  "...Q",
  ".Q.."]
]
解释: 4 皇后问题存在两个不同的解法

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/n-queens
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */


class Solution
{

    /**
     * @param Integer $n
     * @return String[][]
     */
    /**
     * @var array 结果值
     */
    public $res = [];
    /**
     * @var array 列值
     */
    public $cols = [];
    /**
     * @var array  撇值
     */
    public $pie = [];
    /**
     * @var array 纳值
     */
    public $na = [];

    /**
     * @param $n
     * @return array
     */
    function solveNQueens($n)
    {
        if ($n < 1) return [];
        $this->queens($n, 0, []);
        return $this->_generate_result($n);
    }

    /**
     * @param $n 数量
     * @param $i 坐标
     * @param $curState 结果值
     */
    function queens($n, $i, $curState)
    {
        if ($i == $n) {
            array_push($this->res, $curState);
            return;
        }
        for ($j = 0; $j < $n; $j++) {
            if (in_array($j, $this->cols)
                || in_array($i + $j, $this->pie)
                || in_array($i - $j + $n, $this->na)) {
                continue;
            }
            array_push($this->cols, $j);
            array_push($this->pie, $i + $j);
            array_push($this->na, $i - $j + $n);
            $curState[$i] = $j;
            $this->queens($n, $i + 1, $curState);
            array_pop($this->cols);
            array_pop($this->pie);
            array_pop($this->na);
        }
    }

    /**
     * 拼接结果值
     * @param $n 循环的次数
     * @return array
     */
    function _generate_result($n)
    {
        $ret = [];
        if (!empty($this->res)) {
            foreach ($this->res as $v) {
                for ($i = 0; $i < $n; $i++) {
                    $str = '';
                    foreach ($v as $val) {
                        if ($val == $i) {
                            $str .= 'Q';
                        } else {
                            $str .= '.';
                        }
                    }
                    array_push($ret, $str);
                }
            }
        }
        return array_chunk($ret, $n);
    }
}

$Solution = new Solution();
$n = 4;
var_dump($Solution->solveNQueens($n));