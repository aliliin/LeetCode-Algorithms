<?php
/*
给定一个非负整数数组 A， A 中一半整数是奇数，一半整数是偶数。
对数组进行排序，以便当 A[i] 为奇数时，i 也是奇数；当 A[i] 为偶数时， i 也是偶数。
你可以返回任何满足上述条件的数组作为答案。
示例：
输入：[4,2,5,7]
输出：[4,5,2,7]
解释：[4,7,2,5]，[2,5,4,7]，[2,7,4,5] 也会被接受。
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/sort-array-by-parity-ii
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

$A = [4, 2, 5, 7];
print_r(sortArrayByParity1($A));
function sortArrayByParity1($A)
{
    $len = count($A);
    $j   = $len - 2; //  j为偶数的下标
    // i为奇数的下标
    for ($i = $len - 1; $i >= 0; $i = $i - 2) {
        // 奇数位需要调换的偶数
        if ($A[$i] % 2 !== $i % 2) {
            // 偶数位不需要调换的偶数
            while ($A[$j] % 2 === $j % 2) {
                $j = $j - 2;
            }
            [$A[$i], $A[$j]] = [$A[$j], $A[$i]];
        }
    }
    return $A;
}
