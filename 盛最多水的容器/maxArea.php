<?php


$height = [1, 8, 6, 2, 5, 4, 8, 3, 7];

$Solution = new Solution();
var_dump($Solution->maxArea($height));

class Solution
{

    function maxArea($height)
    {
        $max = 0;
        $left = 0;
        $right = count($height) - 1;
        while ($left != $right) {
            if ($height[$left] < $height[$right]) {
                $area = $height[$left] * ($right - $left);
                $left += 1;
            } else {
                $area = $height[$right] * ($right - $left);
                $right -= 1;
            }
            $max = max($max, $area);
        }
        return $max;
    }

    function maxArea2($height)
    {
        $area = 0;
        $left = 0;
        $right = count($height) - 1;
        while ($left < $right) {
            $area = max($area, min($height[$right], $height[$left]) * ($right - $left));
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }
        return $area;
    }

    // 暴力循环
    function maxArea1($height)
    {
        $area = 0;
        for ($i = 0; $i < count($height) - 1; $i++) {
            for ($j = $i + 1; $j < count($height); $j++) {
                $num = min($height[$j], $height[$i]) * ($j - $i);
                $area = max($area, $num);
            }
        }
        return $area;
    }
}