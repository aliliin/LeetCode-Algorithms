<?php
/*
给定一个Excel表格中的列名称，返回其相应的列序号。

例如，

A -> 1
B -> 2
C -> 3
...
Z -> 26
AA -> 27
AB -> 28
...
示例 1:

输入: "A"
输出: 1
示例 2:

输入: "AB"
输出: 28
示例 3:
输入: "ZY"
输出: 701
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/excel-sheet-column-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
$s = "B";
print_r(titleToNumber($s));
function titleToNumber($s)
{
    $res = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        // ord — 转换字符串第一个字节为 0-255 之间的值
        // ord("A")  等于 65
        // ord("Z")  等于 90
        $res = $res * 26 + (ord($s[$i]) - ord('A') + 1);
    }
    return $res;
}
