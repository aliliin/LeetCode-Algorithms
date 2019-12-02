<?php
/*
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。

如果你最多只允许完成一笔交易（即买入和卖出一支股票），设计一个算法来计算你所能获取的最大利润。

注意你不能在买入股票前卖出股票。

示例 1:

输入: [7,1,5,3,6,4]
输出: 5
解释: 在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
     注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格。
示例 2:

输入: [7,6,4,3,1]
输出: 0
解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $maxPrice = 0;
        $min = $prices[0];
        for ($i = 0; $i < count($prices); $i++) {
            if ($prices[$i] < $min) {
                $min = $prices[$i];
            } else {
                $tempPrice = $prices[$i] - $min;
                if ($tempPrice > $maxPrice) {
                    $maxPrice = $tempPrice;
                }
            }
        }
        return $maxPrice;
    }

    /**
     * dp 动态规划的写法
     * @param $prices
     * @return int|mixed
     */
    function maxProfit1($prices)
    {
        if (empty($prices)) return 0;
        // 0，没买，1 买入一股没卖，2。之前买了现在卖了。
        $profit[0][0] = 0; // 没买没卖之前
        $profit[0][1] = -$prices[0]; //  买入一股没卖
        $profit[0][2] = 0; //之前买了现在卖了。
        $maxPrice = 0; // 最大金额
        for ($i = 1; $i < count($prices); $i++) {
            //  没买股票 前一天
            $profit[$i][0] = $profit[$i - 1][0];
            // 买入股票，可以不动（之前已经买过了股票）或者是 前一天没买股票，这一天要买股票，所以要减去购买的金额
            $profit[$i][1] = max($profit[$i - 1][1], $profit[$i - 1][0] - $prices[$i]);
            // 卖了股票，前一天（已经买入的时候的）加上套现的金额
            $profit[$i][2] = $profit[$i - 1][1] + $prices[$i];
            // 每一步，拿出来最大金额
            $maxPrice = max($maxPrice, $profit[$i][0], $profit[$i][1], $profit[$i][2]);
        }
        return $maxPrice;
    }
}

$Solution = new Solution();
$prices = [7, 1, 5, 3, 6, 4];

echo $Solution->maxProfit($prices);
echo $Solution->maxProfit1($prices);