<?php

$nums = [1, 3, 5, 6];
$target = 5;
function searchInsert($nums, $target)
{
    $l = 0;
    $r = count($nums);
    while ($l < $r) {
        $mid = intval(($l + $r) / 2);
        if ($nums[$mid] >= $target) {
            $r = $mid;
        } else {
            $l = $mid + 1;
        }
    }
    return $l;
}

var_dump(searchInsert($nums, $target));
