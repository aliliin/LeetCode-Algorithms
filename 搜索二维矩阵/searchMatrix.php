<?php
$Solution = new Solution();

$matrix = [
    [1, 3, 5, 7],
    [10, 11, 16, 20],
    [23, 30, 34, 50]
];
$target = 3;

var_dump($Solution->searchMatrix($matrix, $target));
var_dump($Solution->searchMatrix1($matrix, $target));
var_dump($Solution->searchMatrix2($matrix, $target));

class Solution
{

    function searchMatrix($matrix, $target)
    {
        foreach ($matrix as $ma) {
            if (in_array($target, $ma)) {
                return true;
            }
        }
        return false;
    }

    function searchMatrix1($matrix, $target)
    {
        $depth = count($matrix);
        if ($depth == 0) return false;
        $len = count($matrix[0]);
        $left = 0;
        $right = $depth * $len - 1;
        while ($left <= $right) {
            $mid = $right - floor(($right - $left) / 2);
            $row = floor($mid / $len);
            $col = fmod($mid, $len);
            if ($matrix[$row][$col] == $target) {
                return true;
            } else if ($matrix[$row][$col] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return false;
    }

    function searchMatrix2($matrix, $target)
    {
        $depth = count($matrix);
        if ($depth == 0) return false;
        $len = count($matrix[0]);
        // 二分查找
        $left = 0;
        $right = $depth * $len - 1;
        while ($left <= $right) {
            $mid = floor(($right + $left) / 2);
            $row = floor($mid / $len);
            $col = floor($mid % $len);
            if ($matrix[$row][$col] == $target) {
                return true;
            } else if ($matrix[$row][$col] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return false;
    }
}