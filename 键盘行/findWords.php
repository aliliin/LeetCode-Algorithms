<?php
/*
给定一个单词列表，只返回可以使用在键盘同一行的字母打印出来的单词。键盘如下图所示。
示例：
输入: ["Hello", "Alaska", "Dad", "Peace"]
输出: ["Alaska", "Dad"]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/keyboard-row
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
$words = ["Hello", "Alaska", "Dad", "Peace"];
$words = ["abdfs", "cccd", "a", "qwwewm"];
print_r(findWords($words));
// 查找字符串的首次出现 stristr 忽略大小写
function findWords($words)
{
    $newArray = [];
    $line     = ["qwertyuiop", 'asdfghjkl', 'zxcvbnm'];
    for ($i = 0; $i < count($words); $i++) {
        $line1 = 0;
        $line2 = 0;
        $line3 = 0;
        for ($j = 0; $j < strlen($words[$i]); $j++) {
            if (stristr('qwertyuiop', $words[$i][$j]) != false) {
                $line1 = $line1 + 1;
                continue;
            }
            if (stristr('asdfghjkl', $words[$i][$j]) != false) {
                $line2 = $line2 + 1;
                continue;
            }
            if (stristr('zxcvbnm', $words[$i][$j]) != false) {
                $line3 = $line3 + 1;
                continue;
            }
        }
        if ($line1 == strlen($words[$i]) or $line2 == strlen($words[$i]) or $line3 == strlen($words[$i])) {
            $newArray[] = $words[$i];
        }
    }
    return $newArray;
}
