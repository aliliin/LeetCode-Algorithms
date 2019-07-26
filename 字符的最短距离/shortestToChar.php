<?php
/*
给定一个字符串 S 和一个字符 C。返回一个代表字符串 S 中每个字符到字符串 S 中的字符 C 的最短距离的数组。
示例 1:
输入: S = "loveleetcode", C = 'e'
输出: [3, 2, 1, 0, 1, 0, 0, 1, 2, 2, 1, 0]
说明:
字符串 S 的长度范围为 [1, 10000]。
C 是一个单字符，且保证是字符串 S 里的字符。
S 和 C 中的所有字母均为小写字母。
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/shortest-distance-to-a-character
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
$S = "loveleetcode";
$C = 'e';
// 输出: [3, 2, 1, 0, 1, 0, 0, 1, 2, 2, 1, 0]
print_r(shortestToChar($S, $C));
function shortestToChar($S, $C)
{
    $numArr = [];
    for ($i = 0; $i < strlen($S); $i++) {
        $n = strpos($S, $C, $i); // 查找字符串首次出现的位置 从 $i 的位置开始查询
        // $n 这里依次顺序为 3，3，3，3，5，5，6，11，11
        $abs = abs($n - $i); // 绝对值
        // 绝对值 这里依次顺序为 3，2，1，0,1,0,0,4,3,2,1,0
        if ($abs == 0) {
            $last = $i;
        }
        if ($last || $last === 0) {
            $num = $i - $last;
            $abs = min($abs, $num);
        }
        $numArr[] = $abs;
    }
    return $numArr;
}
