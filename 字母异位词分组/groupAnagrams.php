<?php
$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];
$strs = ["cab", "tin", "pew", "duh", "may", "ill", "buy", "bar", "max", "doc"];

$solution = new Solution();
var_dump($solution->_sortStr($strs));
var_dump($solution->groupAnagrams($strs));

class Solution
{
    function groupAnagrams($strs)
    {
        $resArr = [];
        foreach ($strs as $str) {
            $sourceStr = str_split($str);
            sort($sourceStr);
            $sourceStr = implode(',', $sourceStr);
            $resArr[$sourceStr][] = $str;
        }
        return $resArr;
    }

    public function _sortStr($strs)
    {
        $resArr = [];
            $prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
            foreach ($strs as $str) {
                $strlen = 1;
                for ($i = 0; $i < strlen($str); $i++) {
                    $strlen *= $prime[ord($str[$i]) - 97];
                }
                $resArr[$strlen][] = $str;
        }
        return $resArr;
    }
}