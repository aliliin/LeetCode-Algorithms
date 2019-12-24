<?php

$g = [1, 2, 3];
$s = [1, 1];
$Solution = new Solution();
print_r($Solution->findContentChildren($g, $s));

class Solution
{

    function findContentChildren($g, $s)
    {
        sort($g);
        sort($s);
        $lenG = count($g);
        $lenS = count($s);
        $i = 0;
        $j = 0;
        $res = 0;
        while ($i < $lenG && $j < $lenS) {
            if ($g[$i] <= $s[$j]) {
                $res += 1;
                $j += 1;
                $i += 1;
            } else {
                $j += 1;
            }
        }
        return $res;
    }

    function findContentChildren1($g, $s)
    {
        sort($g);
        sort($s);
        $lenG = count($g);
        $lenS = count($s);
        $i = 0;
        for ($j = 0; $i < $lenG && $j < $lenS; $j++) {
            if ($g[$i] <= $s[$j]) $i++;
        }
        return $i;

    }
}