<?php
/*
给定一个非负整数数组 A，返回一个数组，在该数组中， A 的所有偶数元素之后跟着所有奇数元素。
你可以返回满足此条件的任何数组作为答案。
示例：
输入：[3,1,2,4]
输出：[2,4,3,1]
输出 [4,2,3,1]，[2,4,1,3] 和 [4,2,1,3] 也会被接受。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/sort-array-by-parity
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
$A = [3, 1, 2, 4];
var_dump(sortArrayByParity($A));
var_dump(sortArrayByParity1($A));
function sortArrayByParity($A)
{
    $i = 0;
    $j = count($A);
    while ($i < $j) {
        if ((abs($A[$i]) + 2) % 2 == 1) {
            $j--;
            $temp  = $A[$i];
            $A[$i] = $A[$j];
            $A[$j] = $temp;
        } else {
            $i++;
        }
    }
    return $A;
}

function sortArrayByParity1($A)
{
    $j = [];
    $o = [];
    for ($i = 0; $i < count($A); $i++) {
        if ((abs($A[$i]) + 2) % 2 == 1) {
            $j[] = $A[$i];
        } else {
            $o[] = $A[$i];
        }
    }
    return array_merge($o, $j);
}
