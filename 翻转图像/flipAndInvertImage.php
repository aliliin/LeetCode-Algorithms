<?php
$A = [[1, 1, 0], [1, 0, 1], [0, 0, 0]];
//首先翻转每一行: [[0,1,1],[1,0,1],[0,0,0]]；
// 然后反转图片: [[1,0,0],[0,1,0],[1,1,1]]
var_dump(flipAndInvertImage($A));
var_dump(flipAndInvertImage1($A));
function flipAndInvertImage($A)
{
    $newArray = array();
    for ($i = 0; $i < count($A); $i++) {
        for ($j = count($A[$i]) - 1; $j >= 0; $j--) {
            $newArray[$i][count($A[$i]) - 1 - $j] = $A[$i][$j] == 1 ? 0 : 1;
        }
    }
    return $newArray;
}

function flipAndInvertImage1($A)
{
    $newArray = array();
    for ($i = 0; $i < count($A); $i++) {
        $newStr = explode(',', strrev(implode($A[$i], ',')));
        for ($j = 0; $j < count($newStr); $j++) {
            $newArray[$i][$j] = $newStr[$j] == 1 ? 0 : 1;
        }
    }
    return $newArray;
    die;
}
