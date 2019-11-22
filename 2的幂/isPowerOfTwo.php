<?php



$n = 6;
var_dump(isPowerOfTwo($n));
var_dump(isPowerOfTwo1($n));

A:
// 循环的笨办法
function isPowerOfTwo($n)
{
    if ($n == 1) return true;
    if ($n == 0) return false;
    if ($n / 2 === 0) {
        return true;
    } else {
        if ($n / 2 > 0) {
            if (isPowerOfTwo($n / 2) == true) {
                return true;
            }
        }
        return false;
    }
}
B:
// 位运算的方法。
function isPowerOfTwo1($n)
{
    return $n > 0 && ($n & ($n - 1)) == 0;
}
