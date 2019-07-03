<?php

/**
移动顺序由字符串表示。字符 move[i] 表示其第 i 次移动。机器人的有效动作有 R（右），L（左），U（上）和 D（下）。如果机器人在完成所有动作后返回原点，则返回 true。否则，返回 false。

输入: "UD"
输出: true
解释：机器人向上移动一次，然后向下移动一次。所有动作都具有相同的幅度，因此它最终回到它开始的原点。因此，我们返回 true。
https://leetcode-cn.com/problems/robot-return-to-origin
 */

$moves = "UDRDLR";
var_dump(judgeCircle($moves));
var_dump(test($moves));

// 统计字符串出现的次数 ，通过自带的函数解决
function test($moves)
{
    if ((abs(strlen($moves)) + 2) % 2 == 1) {
        return false;
    }
    return substr_count($moves, 'U') === substr_count($moves, 'D') && substr_count($moves, 'R') === substr_count($moves, 'L');
}
// 统计字符串出现的次数 ，
function judgeCircle($moves)
{
    if ((abs(strlen($moves)) + 2) % 2 == 1) {
        return false;
    }
    $a = 0;
    $b = 0;
    for ($i = 0; $i < strlen($moves); $i++) {
        if ($moves[$i] == 'U') {
            $a++;
        } elseif ($moves[$i] == 'D') {
            $a--;
        } elseif ($moves[$i] == 'L') {
            $b++;
        } elseif ($moves[$i] == 'R') {
            $b--;
        }
    }
    return $b == 0 && $a == 0;
}
