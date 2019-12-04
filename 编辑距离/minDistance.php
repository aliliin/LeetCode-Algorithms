<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2)
    {
        $m = strlen($word1);
        $n = strlen($word2);
        $dp = [];
        for ($i = 0; $i < $m + 1; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 0; $j < $n + 1; $j++) {
            $dp[0][$j] = $j;
        }
        for ($k = 1; $k < $m + 1; $k++) {
            for ($l = 1; $l < $n + 1; $l++) {
                $dp[$k][$l] = min($dp[$k - 1][$l - 1] + ($word1[$k - 1] == $word2[$l - 1] ? 0 : 1),
                    $dp[$k - 1][$l] + 1, $dp[$k][$l - 1] + 1);
            }
        }
        return $dp[$m][$n];
    }

    function minDistance1($word1, $word2) {
        $edit = [];
        $w1 = strlen($word1);
        $w2 = strlen($word2);
        for ($i = 0; $i <= $w1; ++$i) $edit[$i][0] = $i;
        for ($j = 0; $j <= $w2; ++$j) $edit[0][$j] = $j;
        for ($i = 1; $i <= $w1; ++$i) {
            for ($j = 1; $j <= $w2; ++$j) {
                $flag = $word1[$i - 1] == $word2[$j - 1] ? 0 : 1;
                $edit[$i][$j] = min($edit[$i][$j - 1] + 1, $edit[$i - 1][$j] + 1, $edit[$i - 1][$j - 1] + $flag);
            }
        }
        return $edit[$w1][$w2];
    }
}


$Solution = new Solution();
$word1 = "horse";
$word2 = "ros";
echo $Solution->minDistance($word1, $word2);
echo $Solution->minDistance1($word1, $word2);