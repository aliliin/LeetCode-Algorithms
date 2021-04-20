<?php

/**
 * 实现 strStr() 函数。
 *
 * 给你两个字符串 haystack 和 needle ，请你在 haystack 字符串中找出 needle 字符串出现的第一个位置（下标从 0 开始）。如果不存在，则返回  -1 。
 *
 *  
 *
 * 说明：
 *
 * 当 needle 是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。
 *
 * 对于本题而言，当 needle 是空字符串时我们应当返回 0 。这与 C 语言的 strstr() 以及 Java 的 indexOf() 定义相符。
 *  
 *
 * 示例 1：
 *
 * 输入：haystack = "hello", needle = "ll"
 * 输出：2
 * 示例 2：
 *
 * 输入：haystack = "aaaaa", needle = "bba"
 * 输出：-1
 * 示例 3：
 *
 * 输入：haystack = "", needle = ""
 * 输出：0
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/implement-strstr
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
$haystack = "hello";
$needle = "ll";

var_dump(returns($haystack, $needle));

$haystack = "aaaaa";
$needle = "bba";
var_dump(returns1($haystack, $needle));

function returns($haystack, $needle): int
{
    if ($haystack == $needle) {
        return 0;
    }

    $length = strlen($haystack);
    $n_length = strlen($needle);

    if ($n_length <= 0) {
        return 0;
    }

    if ($length <= 0) {
        return -1;
    }

    if ($n_length > $length) {
        return -1;
    }

    // 这里有个最大长度判断，具体设置多少不清楚，我这里设置的 1000
    if ($length >= 1000) {
        return -1;
    }

    for ($i = 0; $i < $length; $i++) {
        $j = 0;
        while ($haystack[$i + $j] == $needle[$j] && $j < $n_length) {
            $j++;
        }

        if ($n_length == $j) {
            return $i;
        }
    }
    return -1;
}


function returns1($haystack, $needle): int
{
    if ($needle == null || $needle == $haystack) return 0;

    $n_len = strlen($needle);
    $h_len = strlen($haystack);

    for ($i = 0; $i < $h_len - $n_len + 1; $i++) {
        if (substr($haystack, $i, $n_len) == $needle) {
            return $i;
        }
    }

    return -1;
}