<?php

//  最长不含重复字符的子字符串
var_dump(lengthOfLongestSubstring("abcabcbb"));
var_dump(lengthOfLongestSubstring("bbbbb"));
var_dump(lengthOfLongestSubstring("pwwkew"));


function lengthOfLongestSubstring($s)
{
    if ($s == "") return 0;
    if (strlen($s) == 1) return 1;
    $last = [];
    $start = 0;
    $maxLength = 0;
    $str = str_split($s);
    foreach ($str as $index => $value) {
        if (isset($last[$value]) && $last[$value] >= $start) {
            $start = $last[$value] + 1;
        }
        if ($index - $start + 1 > $maxLength) {
            $maxLength = $index - $start + 1;
        }
        $last[$value] = $index;
    }
    return $maxLength;
}
