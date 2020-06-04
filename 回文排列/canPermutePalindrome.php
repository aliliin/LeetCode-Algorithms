<?php

// 面试题 01.04. 回文排列
var_dump(canPermutePalindrome("code"));

function canPermutePalindrome($s)
{
    $newArr = [];

    for ($i = 0; $i < strlen($s); $i++) {

        $newArr[$s[$i]] += 1;

        if ($newArr[$s[$i]] % 2   == 0) {
            unset($newArr[$s[$i]]);
        }
    }

    return count($newArr) <= 1;
}
