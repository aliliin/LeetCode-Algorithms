<?php

/**
 * Class Solution给定不同面额的硬币 coins 和一个总金额 amount。编写一个函数来计算可以凑成总金额所需的最少的硬币个数。如果没有任何一种硬币组合能组成总金额，返回 -1。

示例 1:

输入: coins = [1, 2, 5], amount = 11
输出: 3
解释: 11 = 5 + 5 + 1
示例 2:

输入: coins = [2], amount = 3
输出: -1
说明:
你可以认为每种硬币的数量是无限的。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/coin-change
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{

    public $min = PHP_INT_MAX;

    /**
     * dfs 解法
     */
    function coinChange1($coins, $amount)
    {
        if (empty($coins)) return -1;
        if ($amount == 0) return 0;
        sort($coins);
        if ($amount < $coins[0]) return -1;
        $sum = 0;
        $this->dfs($coins, $amount, $sum, count($coins) - 1);
        return $this->min === PHP_INT_MAX ? -1 : $this->min;
    }

    function dfs($coins, $amount, $sum, $index)
    {
        if ($index < 0 || ($sum + $amount / $coins[$index] >= $this->min)) return;
        if ($amount == 0) {
            $this->min = min($this->min, $sum);
            return;
        }
        for ($i = $index; $i >= 0; --$i) {
            if ($amount < $coins[$i]) continue;
            $this->dfs($coins, $amount - $coins[$i], $sum + 1, $i);
        }
    }

    /**
     * 动态规划
     */
    function coinChange($coins, $amount)
    {
        $dp = array_fill(1, $amount + 1, $amount + 1);
        $dp[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
//            for ($j = 0; $j < count($coins); $j++) {
//                if ($coins[$j] <= $i) {
//                    $dp[$i] = min($dp[$i], $dp[$i - $coins[$j]] + 1);
//                }
//            }
            foreach ($coins as $coin) {
                if ($coin <= $i) {
                    $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
                }
            }
        }
        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }

    /**
     * 超出时间限制
     */
    function coinChange2($coins, $amount)
    {
        if (empty($coins)) return -1;
        if ($amount < 1) return 0;
        return $this->_coinChange($coins, $amount, []);
    }

    function _coinChange($coins, $rem, $count)
    {
        if ($rem < 0) return -1;
        if ($rem === 0) return 0;
        if (!empty($count[$rem - 1]) && $count[$rem - 1] != 0) return $count[$rem - 1];
        $min = PHP_INT_MAX;
        foreach ($coins as $coin) {
            $res = $this->_coinChange($coins, $rem - $coin, $count);
            if ($res >= 0 && $res < $min) {
                $min = 1 + $res;
            }

        }
        $count[$rem - 1] = ($min == PHP_INT_MAX) ? -1 : $min;
        return $count[$rem - 1];
    }
}

$Solution = new Solution();
$coins = [1, 2, 5];
$amount = 100;
//$coins = [2];
//$amount = 3;
echo $Solution->coinChange($coins, $amount);
echo $Solution->coinChange1($coins, $amount);
echo $Solution->coinChange2($coins, $amount);