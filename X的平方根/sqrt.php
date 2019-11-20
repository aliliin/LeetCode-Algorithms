<?php

// 二分查找法
function mySqrt($x)
{
    if ($x == 0 || $x == 1) return $x;
    $l = 1;
    $r = $x;
    $res = 0;
    while ($l <= $r) {
        $mid = floor(($l + $r) / 2);
        if ($mid == floor($x / $mid)) {
            return $mid;
        } elseif ($mid > floor($x / $mid)) {
            $r = $mid - 1;
        } else {
            $l = $mid + 1;
            $res = $mid;
        }
    }
    return $res;
}

// 牛顿迭代法
function mySqrt1($x)
{
    $r = $x;
    while ($r * $r > $x) {
        $r = floor(($r + $x / $r) / 2);
    }
    return $r;
}

var_dump(mySqrt(15));
var_dump(mySqrt1(15));