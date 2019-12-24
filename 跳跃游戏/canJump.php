<?php

$Solution = new Solution();
$nums = [2, 3, 1, 1, 4];

var_dump($Solution->canJump($nums));
var_dump($Solution->canJump1($nums));

class Solution
{

    /**
     * 贪心算法
     */
    function canJump($nums)
    {
        if (empty($nums)) return false;
        $end = count($nums) - 1;
        for ($i = $end; $i >= 0; $i--) {
            if ($nums[$i] + $i >= $end) {
                $end = $i;
            }
        }
        return $end == 0;
    }

    function canJump1($nums)
    {
        $res = 0;
        foreach ($nums as $k => $num) {
            if ($k > $res) return false;
            if ($num + $k > $res) $res = $num + $k;
        }
        return $res >= count($nums) - 1;
    }
}