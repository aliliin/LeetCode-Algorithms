<?php

/**
 * 实现 pow(x, n) ，即计算 x 的 n 次幂函数。
 * 示例 1:
 * 输入: 2.00000, 10
 * 输出: 1024.00000
 * 示例 2:
 * 输入: 2.10000, 3
 * 输出: 9.26100
 * 示例 3:
 *
 * 输入: 2.00000, -2
 * 输出: 0.25000
 * 解释: 2-2 = 1/22 = 1/4 = 0.25
 * 说明:
 *
 * -100.0 < x < 100.0
 * n 是 32 位有符号整数，其数值范围是 [−231, 231 − 1] 。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/powx-n
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */


class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if (empty($n)) {
            return 1;
        }
        if ($n < 0) { // 负数是倒数
            return 1 / $this->myPow($x, -$n);
        }
        if ($n % 2) { // n 是 奇数的话，直接通过 n -1 来进行平方也就是 相乘的计算
            return $x * $this->myPow($x, $n - 1); // 多递归一层
        }
        return $this->myPow($x * $x, $n / 2); // 是偶数
    }

    function feidigui($x, $n)
    {
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }
        $pow = 1;
        while ($n) {
            if ($n & 1) {
                $pow *= $x;
            }
            $x *= $x;
            $n >>= 1;
        }
        return $pow;
    }
}

$solution = new Solution();

$x = 2.00000;
$n = 10;
echo $solution->myPow($x, $n);