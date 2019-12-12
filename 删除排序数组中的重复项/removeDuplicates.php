<?php


$nums = [1, 1, 2];
$Solution = new  Solution();
var_dump($Solution->removeDuplicates1($nums));
var_dump($Solution->removeDuplicates($nums));
var_dump($Solution->removeDuplicates2($nums));
var_dump($Solution->removeDuplicates3($nums));

class Solution
{

    function removeDuplicates(&$nums)
    {
        if (count($nums) == 0) return 0;
        $i = 0;
        foreach ($nums as $num) {
            if ($nums[$i] != $num) {
                $i++;
                $nums[$i] = $num;
            }
        }
        return $i + 1;
    }


    function removeDuplicates1(&$nums)
    {
        if (count($nums) == 0) return 0;
        $i = 1;
        foreach ($nums as $num) {
            if ($nums[$i] == $num) {
                unset($nums[$i]);
                $i++;
            }
        }
        return count($nums);
    }

    function removeDuplicates2(&$nums)
    {
        $len = count($nums);
        if ($len == 0) return 0;
        $count = 0;
        for ($i = 1; $i < $len; $i++) {
            if ($nums[$i] == $nums[$i - 1]) {
                $count++;
            } else {
                $nums[$i - $count] = $nums[$i];
            }
        }
        return $len - $count;
    }

    function removeDuplicates3(&$nums)
    {
        $len = count($nums);
        if ($len == 0) return 0;
        for ($i = 0; $i < $len - 1; $i++) {
            if ($nums[$i] == $nums[$i + 1]) {
                unset($nums[$i]);
            }
        }
        return count($nums);
    }
}