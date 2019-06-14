<?php
/**
给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
说明：
你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
示例 1:
输入: [2,2,1]
输出: 1
示例 2:
输入: [4,1,2,1,2]
输出: 4
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function singleNumber($nums)
    {
        // 统计每个值出现的次数
        $valNums = array_count_values($nums);
        foreach ($valNums as $key => $value) {
            if ($value === 1) {
                return $key;
            }
        }
    }
}
$nums = [4, 1, 2, 1, 2];

$res = new Solution();
// print_r($res->singleNumber($nums));
