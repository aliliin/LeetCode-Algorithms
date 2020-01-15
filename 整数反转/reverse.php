<?php

// 整数反转

$x = 123; // 321
$Solution = new Solution();
print_r($Solution->reverse($x));

class Solution
{
    function reverse($x)
    {
        $res  = 0;
        while ($x != 0) {
            $res = floor($res * 10 + $x % 10);
            if ($x < 0) {
                $x = ceil($x / 10);
            } else {
                $x = floor($x / 10);
            }
            if ($res > Pow(2, 31) - 1 || $res < -Pow(2, 31) - 1) {
                return 0;
            }
        }
        return $res;
    }
}
