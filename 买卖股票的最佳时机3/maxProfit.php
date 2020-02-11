<?php
// 买卖股票的最佳时机3

class Solution
{

    // dp[i][0] = max(dp[i-1][0], dp[i-1][1] + prices[i])
    // dp[i][1] = max(dp[i-1][1], dp[i-2][0] - prices[i])
    // 解释：第 i 天选择 buy 的时候，要从 i-2 的状态转移，而不是 i-1 。

    function maxProfit($prices)
    {
        $n = count($prices);
        $dp_i_0 = 0;
        $dp_pre_0 = 0; // 代表 dp[i-2][0]
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < $n; $i++) {
            $temp = $dp_i_0;
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, $dp_pre_0 - $prices[$i]);
            $dp_pre_0 = $temp;
        }
        return $dp_i_0;
    }
    function maxProfit2($prices)
    {
        // dp
        // dp[day][k][0 or 1]
        // dp[i][k][0] = max(dp[i - 1][k][0], dp[i - 1][k][1] + prices[i]);
        // dp[i][k][1] = max(dp[i - 1][k][1], dp[i - 1][k - 1][0] - prices[i])
        $len = count($prices);
        if ($len <= 1) return 0;
        $dp = array_fill(0, $len, array_fill(0, 2, array_fill(0, 2, null)));
        for ($k = 0; $k < 2; ++$k) {
            for ($i = 0; $i < $len; ++$i) {
                if ($i - 1 == -1) {
                    $dp[$i][$k][0] = max(0, PHP_INT_MIN + $prices[$i]);
                    $dp[$i][$k][1] = max(PHP_INT_MIN, 0 - $prices[$i]);
                } else {
                    $dp[$i][$k][0] = max($dp[$i - 1][$k][0], $dp[$i - 1][$k][1] + $prices[$i]);
                    if ($k - 1 == -1) {
                        $dp[$i][$k][1] = max($dp[$i - 1][$k][1], -$prices[$i]);
                    } else {
                        $dp[$i][$k][1] = max($dp[$i - 1][$k][1], $dp[$i - 1][$k - 1][0] - $prices[$i]);
                    }
                }
            }
        }
        return $dp[$len - 1][1][0];
    }
    function maxProfit1($prices)
    {
        if (empty($prices)) return 0;
        $s1 = -$prices[0];
        $s2 = PHP_INT_MIN;
        $s3 = PHP_INT_MIN;
        $s4 = PHP_INT_MIN;
        for ($i = 1; $i < count($prices); $i++) {
            $s1 = max($s1, -$prices[$i]);
            $s2 = max($s2, $s1 + $prices[$i]);
            $s3 = max($s3, $s2 - $prices[$i]);
            $s4 = max($s4, $s3 + $prices[$i]);
        }
        return max(0, $s4);
    }
}

$Solution = new Solution();
$prices = [3, 3, 5, 0, 0, 3, 1, 4]; // 6
$prices = [2, 1, 2, 0, 1];
echo $Solution->maxProfit($prices);
