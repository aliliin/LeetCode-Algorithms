<?php

$n = 4;
$k = 2;
$Solution = new Solution();
var_dump($Solution->combine1($n, $k));

class Solution
{

    private $n;
    private $k;
    private $res;
    // 第二种解法
    private $combs = [];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k)
    {
        $this->n = $n;
        $this->k = $k;
        $this->backtrack(1, []);
        return $this->res;
    }

    private function backtrack($first, $res)
    {
        if (count($res) == $this->k) {
            $this->res[] = $res;
        }
        for ($i = $first; $i < $this->n + 1; $i++) {
            array_push($res, $i);
            $this->backtrack($i + 1, $res);
            array_pop($res);
        }
    }

    // 第二种解法
    function combine1($n, $k)
    {
        $combs = [];
        $this->combine11($combs, [], 1, $n, $k);
        return $combs;
    }

    private function combine11($combs, $comb, $start, $n, $k)
    {
        if ($k == 0) {
            array_push($combs, $comb);
            return;
        }

        for ($i = $start; $i < $n - $k + 1; $i++) {
            array_push($comb, $i);
            $this->combine11($combs, $comb, $i + 1, $n, $k - 1);
            array_pop($comb);
        }

    }

}