<?php

$senate = '"RRDDD"';
print_r(predictPartyVictory($senate));
print_r(predictPartyVictory1($senate));
function predictPartyVictory1($senate)
{
    $n = strlen($senate);
    $nextStr = '';
    $curStr  = $senate;
    $radiant = $dire    = 0;
    while (true) {
        for ($i = 0; $i < $n; $i++) {
            if ($curStr[$i] == 'R') {
                if ($dire > 0) {
                    $radiant--;
                } else {
                    $nextStr .= 'R';
                    $dire++;
                }
            } else {
                if ($dire > 0) {
                    $dire--;
                } else {
                    $nextStr .= 'D';
                    $radiant++;
                }
            }
        }
        $n = strlen($nextStr);
        if ($radiant >= $n) {
            return 'Dire';
        }
        if ($dire >= $n) {
            return 'Radiant';
        }
        $curStr  = $nextStr;
        $nextStr = '';
    }
}


function predictPartyVictory($senate)
{
    $dire =  new SplQueue();
    $radiant = new SplQueue();
    $len = strlen($senate);
    for ($i = 0; $i < $len; $i++) {
        if ($senate[$i] == 'R') {
            $radiant->enqueue($i);
        } else {
            $dire->enqueue($i);
        }
    }
    while (!$radiant->isEmpty() && !$dire->isEmpty()) {
        $r = $radiant->dequeue();
        $d = $dire->dequeue();
        if ($r > $d) {
            $dire->enqueue($d + $len);
        } else {
            $radiant->enqueue($r + $len);
        }
    }
    return $dire->isEmpty() ? "Radiant" : "Dire";
}
