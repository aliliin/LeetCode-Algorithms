<?php

$Solution = new Solution();
$nums = [1, 1, 2];
print_r($Solution->permuteUnique($nums));

class Solution
{

    private $res = [];
    private $visited = []; // 判断是否访问过。

    function permuteUnique($nums)
    {
        sort($nums);
        $this->do([], $nums);
        return $this->res;
    }

    function do($array, $nums)
    {
        if (count($array) == count($nums)) {
            array_push($this->res, $array);
            return;
        }
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($this->visited[$i]) && $this->visited[$i] == 1) continue;
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && $this->visited[$i - 1] == 0) continue;
            $this->visited[$i] = 1;
            array_push($array, $nums[$i]);
            $this->do($array, $nums);
            array_pop($array);
            $this->visited[$i] = 0;

        }

    }
}