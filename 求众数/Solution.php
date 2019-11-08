<?php
/**
 * 给定一个大小为 n 的数组，找到其中的众数。众数是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。
 * 你可以假设数组是非空的，并且给定的数组总是存在众数。
 *
 * 示例 1:
 * 输入: [3,2,3]
 * 输出: 3
 * 示例 2:
 * 输入: [2,2,1,1,1,2,2]
 * 输出: 2
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/majority-element
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{

    /**
     * PHP 自带函数进行解决
     */
    function majorityElement($nums)
    {
        $majority = count($nums) / 2;
        foreach (array_count_values($nums) as $key => $value) {
            if ($value >= $majority) {
                return $key;
            }
        }
    }

    /**
     * 先排序从小到大排序整型数组 O(NlogN)
     */
    function majorityElement1($nums)
    {
        sort($nums);
        return $nums[count($nums) / 2];
    }

    /**
     * 暴力循环
     *
     */
    function majorityElement2($nums)
    {
        $count = 0;
        $current = 0;
        foreach ($nums as $key => $value) {
            if ($count == 0) {
                $current = $value;
                $count++;
            } elseif ($current == $value) {
                $count++;
            } else {
                $count--;
            }
        }
        return $current;

    }

    /**
     * 分治方法 一分为 2
     * left == right
     * right == left
     * 不想等的话， return count(l) > count(r) 谁大返回谁
     */
    function majorityElement3($nums)
    {

    }
}

$nums = [3, 2, 3];
//$nums = [2, 2, 1, 1, 1, 2, 2];

$solution = new Solution();
echo $solution->majorityElement2($nums);