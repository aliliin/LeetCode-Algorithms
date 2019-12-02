<?php
/**
 * 给定一个整数数组 nums ，找出一个序列中乘积最大的连续子序列（该序列至少包含一个数）。

示例 1:

输入: [2,3,-2,4]
输出: 6
解释: 子数组 [2,3] 有最大乘积 6。
示例 2:

输入: [-2,0,-1]
输出: 0
解释: 结果不能为 2, 因为 [-2,-1] 不是子数组。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/maximum-product-subarray
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{

    /**
     * 递归版本
     * $nums = [0, 2]; $nums = [-2, 0, -1]; 会出现通过不了的情况
     *  就是将递推转变为dfs的递归，每次带上最大和最小两个状态，当递归到数组末尾，返回。过程中，始终记录最大值。
     */
    public $res = PHP_INT_MIN;

    function maxProduct2($nums)
    {
        if (empty($nums)) return 0;
        $this->_dfs($nums, 0, 1, 1);
        return $this->res;

    }

    private function _dfs($nums, $i, $positive, $negative)
    {
        if ($i == count($nums)) return;
        $num = $nums[$i];
        if ($num > 0) {
            $positive = $positive * $num;
            $negative = $negative * $num;
        } else {
            $tempNegative = $positive * $num;
            $positive = $negative * $num;
            $negative = $tempNegative;
            if ($num < $negative) {
                $negative = $num;
            }
        }
        if ($this->res < $positive) {
            $this->res = $positive;
        }
        $this->_dfs($nums, $i + 1, $positive, $negative);
    }

    // 厉害的版本
    function maxProduct1($nums)
    {
        if (empty($nums)) return 0;
        $maxNumber = PHP_INT_MIN;
        $max = 1;
        $min = 1;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] < 0) {
                $temp = $max;
                $max = $min;
                $min = $temp;
            }
            $max = max($nums[$i], ($nums[$i] * $max));
            $min = min($nums[$i], ($nums[$i] * $min));
            $maxNumber = max($max, $maxNumber);
        }
        return $maxNumber;
    }

    /**
     * 动态规划版本
     * @param $nums
     * @return int|mixed
     */
    function maxProduct($nums)
    {
        if (empty($nums)) return 0;
        $dp[0][0] = $dp[0][1] = $nums[0];
        // 最终的结果 PHP 如果不这样子定义结果会出现偏差
        $res = PHP_INT_MIN; // （此PHP版本中支持的最小整数。）
        for ($i = 0; $i < count($nums); $i++) {
            $x = $i % 2;
            $y = ($i - 1) % 2;
            $n = empty($dp[$y][0]) ? 1 : $dp[$y][0];
            $m = empty($dp[$y][1]) ? 1 : $dp[$y][1];

            if ($nums[$i] >= 0) {
                $dp[$x][0] = max($n * $nums[$i], $nums[$i]);
                $dp[$x][1] = min($m * $nums[$i], $nums[$i]);
            } else {
                $dp[$x][0] = max($m * $nums[$i], $nums[$i]);
                $dp[$x][1] = min($n * $nums[$i], $nums[$i]);
            }
            /**
             *  下面两行 和上面的判断条件是重复的，写那个都行。
             */
            $dp[$x][0] = max(max($n * $nums[$i], $m * $nums[$i]), $nums[$i]);
            $dp[$x][1] = min(min($n * $nums[$i], $m * $nums[$i]), $nums[$i]);
            $res = max($res, $dp[$x][0]);
        }
        return $res;
    }


    /**
     * 暴力解决 特别慢的版本
     */
    function maxProduct4($nums)
    {
        $curMax = PHP_INT_MIN;
        $size = count($nums);
        for ($i = 0; $i < $size; ++$i) {
            $max = 1;
            for ($j = $i; $j < $size; ++$j) {
                $max *= $nums[$j];
                if ($max > $curMax) {
                    $curMax = $max;
                }
            }
        }
        return $curMax;
    }
}

$solution = new Solution();
$nums = [2, 3, -2, 4];
$nums = [-2,];
$nums = [0, 2];
$nums = [-2, 0, -1];
echo $solution->maxProduct($nums);
echo $solution->maxProduct1($nums);
echo $solution->maxProduct2($nums);
