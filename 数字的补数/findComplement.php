<?php
/*
给定一个正整数，输出它的补数。补数是对该数的二进制表示取反。

注意:

给定的整数保证在32位带符号整数的范围内。
你可以假定二进制数不包含前导零位。
示例 1:
输入: 5
输出: 2
解释: 5的二进制表示为101（没有前导零位），其补数为010。所以你需要输出2。
示例 2:
输入: 1
输出: 0
解释: 1的二进制表示为1（没有前导零位），其补数为0。所以你需要输出0。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/number-complement
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
/*
输入：[3,1,2,4]
输出：[2,4,3,1]
输出 [4,2,3,1]，[2,4,1,3] 和 [4,2,1,3] 也会被接受。*/
$A = [3, 1, 2, 4];
var_dump(sortArrayByParity($A));
function sortArrayByParity($A)
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

$num = 5;
var_dump(findComplement($num));

function findComplement($num)
{
    // 利用PHP自带的函数解决
    $newNum = decbin($num);
    $str    = '';
    for ($i = 0; $i < strlen($newNum); $i++) {
        if ($newNum[$i] == 0) {
            $str .= 1;
        } else {
            $str .= 0;
        }
    }
    return bindec($str);
}
