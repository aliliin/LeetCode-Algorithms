<?php


class Solution
{

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills)
    {
        $five = 0;
        $ten = 0;
        foreach ($bills as $bill) {
            if ($bill == 5) {
                $five += 1;
            } elseif ($bill == 10) {
                if ($five == 0) return false;
                $five -= 1;
                $ten += 1;
            } else {
                if ($five > 0 && $ten > 0) {
                    $five -= 1;
                    $ten -= 1;
                } elseif ($five >= 3) {
                    $five -= 3;
                } else {
                    return false;
                }
            }
        }
        return true;
    }

    function lemonadeChange1($bills)
    {
        $five = 0;
        $ten = 0;
        foreach ($bills as $bill) {
            if ($bill == 5) {
                $five += 1;
            } elseif ($bill == 10) {
                if ($five == 0) return false;
                $five -= 1;
                $ten += 1;
            } else {
                if ($five > 0 && $ten > 0) {
                    $ten -= 1;
                    $five -= 1;
                } elseif ($five >= 3) {
                    $five -= 3;
                } else {
                    return false;
                }
            }
        }
        return true;
    }
}

$Solution = new Solution();
$bills = [5, 5, 5, 10, 5, 5, 10, 20, 20, 20];
$bills = [5, 5, 10, 10, 20];
// [5,5,10,10,20];
print_r($Solution->lemonadeChange1($bills));
print_r($Solution->lemonadeChange($bills));