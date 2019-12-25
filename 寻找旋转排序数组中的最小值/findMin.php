<?php

$nums = [3, 4, 5, 1, 2];
$nums = [4, 5, 6, 7, 0, 1, 2];
$Solution = new Solution();
var_dump($Solution->findMin($nums));

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findMin($nums)
    {
        if (empty($nums)) return 0;
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($nums[$mid] > $nums[$mid + 1]) return $nums[$mid + 1];
            if ($nums[$mid] < $nums[$mid - 1]) return $nums[$mid];
            if ($nums[0] < $nums[$mid]) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return null;
    }

    function findMin1($nums)
    {
        return min($nums);
    }
}