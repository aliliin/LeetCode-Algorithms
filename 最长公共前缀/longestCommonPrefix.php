<?php
$Solution = new Solution();
$strs = ["flower", "flow", "flight"];
var_dump($Solution->longestCommonPrefix($strs));


class Solution
{
    function longestCommonPrefix($strs)
    {
        if (!$strs) return '';
        if (count($strs) == 1) return $strs[0];
        $i = 0;
        $prefix = '';
        while (true) {
            $curr = $strs[0][$i];
            if (!$curr) return $prefix;
            foreach ($strs as $str) {
                if ($str[$i] != $curr) return $prefix;
            }
            $prefix .= $curr;
            $i++;
        }
        return $prefix;
    }

    function longestCommonPrefix1($strs)
    {
        if (!$strs) return '';
        if (count($strs) == 1) return $strs[0];
        $min = strlen($strs[0]);
        $key = 0;
        foreach ($strs as $k => $str) {
            if (strlen($str) <= $min) {
                $key = $k;
                $min = strlen($str);
            }
        }
        $minStr = $strs[$key];
        unset($strs[$key]);
        $left = 1;
        $right = strlen($minStr);
        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($this->_isPrefix($strs, substr($minStr, 0, $mid))) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return substr($minStr, 0, min($left, $right));
    }

    private function _isPrefix($strs, $prefix)
    {
        foreach ($strs as $s) {
            if (substr($s, 0, strlen($prefix)) != $prefix) {
                return false;
            }
        }
        return true;
    }
}