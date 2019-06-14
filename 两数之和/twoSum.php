<?php
/**
给定 nums = [2, 7, 11, 15], target = 9
因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]
 */
$nums   = [2, 7, 11, 15];
$target = 9;
$nums   = [2, 34, 7, 15];
$target = 9;
$nums   = [2, 4, 7, 15];
$target = 11;
function twoSum($nums, $target)
{
    $found = [];
    $count = count($nums);
    for ($i = 0; $i < $count; $i++) {
        $diff = $target - $nums[$i];
        if (array_key_exists($diff, $found)) {
            return [$found[$diff], $i];
        }
        $found[$nums[$i]] = $i;
    }
}
print_r(twoSum($nums, $target));
