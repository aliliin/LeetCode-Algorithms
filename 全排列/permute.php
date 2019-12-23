<?php

$Solution = new Solution();
$nums = [1,2,3];
print_r($Solution->permute($nums));
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public $res = [];

    function permute($nums)
    {
        $this->doing([], $nums);
        return $this->res;
    }

    function doing($array, $nums)
    {
        if (count($array) == count($nums)) {
            array_push($this->res, $array);
            return;
        }
        for ($i = 0; $i < count($nums); $i++) {
            if (in_array($nums[$i], $array)) continue;
            array_push($array, $nums[$i]);
            $this->doing($array, $nums);
            array_pop($array);
        }
    }
}