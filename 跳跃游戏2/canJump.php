<?php


$Solution = new Solution();
$nums = [2, 3, 1, 1, 4];

var_dump($Solution->canJump($nums));

class Solution
{

    /**
     * 贪心算法
     */
    function canJump($nums)
    {
        if (empty($nums)) return false;
        $end = 0;
        $maxPosition = 0;
        $step = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            // 找到跳的最远的
            $maxPosition = max($maxPosition, $nums[$i] + $i);
            // 遇到边界就更新边界，并且 步数加1 ¥step +1
            if ($i == $end) {
                $end = $maxPosition;
                $step++;
            }
        }
        return $step;
    }

}