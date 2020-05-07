<?php

// 983. 最低票价

//输入：days = [1,4,6,7,8,20], costs = [2,7,15]
// 输出：11

$days = [1, 4, 6, 7, 8, 20];
$costs = [2, 7, 15];


var_dump(mincostTickets($days, $costs));

function mincostTickets($days, $costs)
{
    $dayCount = count($days);
    $dp  = array_fill(0, $days[$dayCount - 1] + 1, 0);

    for ($i = 1; $i <= $days[$dayCount - 1]; $i++) {
        if (!in_array($i, $days)) {
            $dp[$i] = $dp[$i - 1];
        } else {
            $dp_7 = $i >= 7  ? $dp[$i - 7]  : 0;
            $dp_30 = $i >= 30  ? $dp[$i - 30]  : 0;
            $dp[$i] =  min($dp[$i - 1] + $costs[0], $dp_7 + $costs[1], $dp_30 + $costs[2]);
        }
    }
    return array_pop($dp);
}
