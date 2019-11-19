<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        for ($i = 0; $i < 9; $i++) {
            $rows = [];
            $cols = [];
            $grid = [];
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] != '.' && in_array($board[$i][$j], $rows)) {
                    return false;
                } else {
                    array_push($rows, $board[$i][$j]);
                }

                if ($board[$j][$i] != '.' && in_array($board[$j][$i], $cols)) {
                    return false;
                } else {
                    array_push($cols, $board[$j][$i]);
                }

                $x = 3 * floor($i / 3) + floor($j / 3);
                $y = 3 * floor($i % 3) + floor($j % 3);
                if ($board[$x][$y] != '.' && in_array($board[$x][$y], $grid)) {
                    return false;
                } else {
                    array_push($grid, $board[$x][$y]);
                }
            }

        }
        return true;
    }
}

$Solution = new Solution();


$arr = [
    ["5", "3", ".", ".", "7", ".", ".", ".", "."],
    ["6", ".", ".", "1", "9", "5", ".", ".", "."],
    [".", "9", "8", ".", ".", ".", ".", "6", "."],
    ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
    ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
    ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
    [".", "6", ".", ".", ".", ".", "2", "8", "."],
    [".", ".", ".", "4", "1", "9", ".", ".", "5"],
    [".", ".", ".", ".", "8", ".", ".", "7", "9"]
];

var_dump($Solution->isValidSudoku($arr));
