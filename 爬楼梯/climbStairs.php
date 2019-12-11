<?php

/**
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 *
 * 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 *
 * 注意：给定 n 是一个正整数。
 *
 * 示例 1：
 *
 * 输入： 2
 * 输出： 2
 * 解释： 有两种方法可以爬到楼顶。
 * 1.  1 阶 + 1 阶
 * 2.  2 阶
 * 示例 2：
 *
 * 输入： 3
 * 输出： 3
 * 解释： 有三种方法可以爬到楼顶。
 * 1.  1 阶 + 1 阶 + 1 阶
 * 2.  1 阶 + 2 阶
 * 3.  2 阶 + 1 阶
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/climbing-stairs
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{

    /**
     * @param Integer $n
     * f(n)=f(n-1)+f(n-2)
     * 会超出时间限制 ，因为要反复的来回进行计算。
     */
    function climbStairs($n)
    {
        return $n <= 2 ? $n : ($this->climbStairs($n - 1) + $this->climbStairs($n - 2));
    }
    // 进阶版本

    /**
     * dp 状态的定义，
     * f(0) = f(1) = 1
     * f(n)表示 到 第 n 阶的总 走法 个数，n 就是你走的状态 n =2 可以上楼梯，n=1 也可以走上楼梯
     * dp 的方程 编写
     * f(n)=f(n-1)+f(n-2)
     */
    function climbStairs1($n)
    {
        return $this->_climbStairs1($n);
    }

    // 进阶版本 新建一个数组来存储走过的步数
    function _climbStairs1($n, $arr = [])
    {
        $arr[0] = 1;
        $arr[1] = 2;
        for ($i = 2; $i <= $n; ++$i) {
            $arr[$i] = $arr[$i - 1] + $arr[$i - 2];
        }
        return $arr[$n - 1];
    }

    function climbStairs2($n)
    {
        if ($n <= 2) return $n;
        $one = 2;
        $two = 1;
        $all = 0;
        for ($i = 2; $i < $n; $i++) {
            $all = $one + $two;
            $two = $one;
            $one = $all;
        }
        return $all;
    }


}

$solution = new Solution();
$n = 20;
echo $solution->climbStairs($n);
echo $solution->climbStairs1($n);
echo $solution->climbStairs2($n);
