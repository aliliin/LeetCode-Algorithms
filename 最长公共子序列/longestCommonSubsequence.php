<?php
// 1143. 最长公共子序列

$text1 = "abcde";
$text2 = "ace";


$Solution = new Solution();
var_dump($Solution->longestCommonSubsequence($text1, $text2));

class Solution
{
    // dp
    function longestCommonSubsequence($text1, $text2)
    {
        $s1 = strlen($text1);
        $s2 = strlen($text2);
        $dp = [];
        for ($i = 0; $i <= $s1; $i++) {
            for ($j = 0; $j <= $s2; $j++) {
                $dp[$i][$j] = 0;
            }
        }
        for ($i = 1; $i <= $s1; $i++) {
            for ($j = 1; $j <= $s2; $j++) {
                // 如果尾端相同
                if ($text1[$i - 1] == $text2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
                }
            }
        }
        return $dp[$s1][$s2];
    }
}
