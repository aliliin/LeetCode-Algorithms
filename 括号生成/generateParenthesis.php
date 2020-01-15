<?php

/**
 给出 n 代表生成括号的对数，请你写出一个函数，使其能够生成所有可能的并且有效的括号组合。

例如，给出 n = 3，生成结果为：

[
  "((()))",
  "(()())",
  "(())()",
  "()(())",
  "()()()"
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/generate-parentheses
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{
    public $list = []; // 先定一个用于接收结果的数组

    /**
     * 使用递归的方式
     */
    function generateParenthesis($n)
    {
        return $this->_generateParenthesis(0, 0, $n, '');
    }

    /**
     * 新建设 递归方法 （剪枝）
     * @param $left 左括号数量
     * @param $right 又括号数量
     * @param $n
     * @param $result   用于存放数组中括号的字符
     * @return array
     */
    function _generateParenthesis($left, $right, $n, $result)
    {
        if ($left == $n && $right == $n) {
            $this->list[] = $result;
        }

        if ($left < $n) {
            $this->_generateParenthesis($left + 1, $right, $n, $result . "(");
        }

        if ($left > $right and $right < $n) {
            $this->_generateParenthesis($left, $right + 1, $n, $result . ")");
        }
        return $this->list;
    }

    function gen($n)
    {
        return $this->_gen("", $n, $n);
    }

    /**
     *  另一种递归方法
     */
    function _gen($result, $left, $right)
    {
        if ($left == 0 && $right == 0) {
            $this->list[] = $result;
        }
        if ($left > 0) {
            $this->_gen($result . "(", $left - 1, $right);
        }
        if ($right > $left) {
            $this->_gen($result . ")", $left, $right - 1);
        }
        return $this->list;
    }

    // 动态规划
    function generateParenthesis1($n)
    {
        if ($n == 0) {
            return [];
        }
        if ($n == 1) {
            return ["()"];
        }
        $dp = [];
        $dp[0][] = "";
        $dp[1][] = "()";
        for ($i = 2; $i < $n + 1; $i++) {
            for ($j = 0; $j < $i; $j++) {
                for ($p = 0; $p < count($dp[$j]); $p++) {
                    for ($q = 0; $q < count($dp[$i - $j - 1]); $q++) {
                        $dp[$i][] = "(" . $dp[$j][$p] . ")" . $dp[$i - $j - 1][$q];
                    }
                }
            }
        }
        return $dp[$n];
    }
}

$sulution = new Solution();
$n = 3;
$res = $sulution->generateParenthesis1($n);
var_dump($res);
die;
die;

$res = $sulution->generateParenthesis($n);
$res1 = $sulution->gen($n);
print_r($res);
echo '----';
print_r($res1);
