<?php

$stones = [2, 7, 4, 1, 8, 1];
var_dump(lastStoneWeight($stones));

function lastStoneWeight($stones)
{
    while (count($stones) > 1) {
        rsort($stones);
        $s1 = array_shift($stones);
        $s2 = array_shift($stones);
        if ($s1 !== $s2) $stones[] = $s1 - $s2;
    }

    $n = count($stones);
    if ($n === 0) return 0;
    if ($n === 1) return $stones[0];
}
