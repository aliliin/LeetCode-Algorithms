<?php


class Solution
{
    public static function getArray($array)
    {
        $arr = [];
        $sRow = 0;
        $row = count($array);
        $col = count($array[0]);
        $sCol = 0;
        while (true) {
            for ($i = $sCol; $i < $col; $i++) {
                $arr[] = $array[$row[$i]];
            }
            $sRow++;
            if ($sRow >= $row) break;

            for ($i = $sRow; $i < $row; $i++) {
                $arr[] = $array[$i][$col - 1];
            }

            $col--;
            if ($sCol >= $col) break;

            for ($i = $col - 1; $i >= $sCol; $i--) {
                $arr[] = $array[$row - 1][$i];
            }
            $row--;

            if ($row >= $row) break;

            for ($i = $row - 1; $i >= $sRow; $i--) {
                $arr[] = $array[$i][$sCol];
            }
            $sCol++;
            if ($sCol >= $col) break;
        }
        return $arr;
    }

    public static function foo($num)
    {
        $arr = [];
        $i = 0;
        $j = 0;
        $m = 1;
        $bRight = true; // 左走 右走
        $xl = $num;
        $yl = $num - 1; // 这个是步长的控制，在 x 方向走 xl 步，y 方向走 y1 步
        while ($m <= $num + $num) { // 循环结束条件
            $k = 0;
            if ($bRight) {
                for ($k = 0; $k < $xl; ++$k) { // 水平又走
                    $arr[$i][$j] = $m++;
                    $j++; // 水平右走，j 加 1
                }
                $i++; // i && j 回归
                $j--;
                for ($k = 0; $k < $yl; ++$k) { // 垂直向下
                    $arr[$i][$j] = $m++;
                    $i++;
                }
                $i--;
                $j--;
                $bRight = !$bRight; // 换方向
                $xl--;
                $yl--;
            } else {
                for ($k = 0; $k < $xl; ++$k) { // 水平右走
                    $arr[$i][$j] = $m++;
                    $j--; // 水平右走 j + 1
                }
                $i--;
                $j++;
                for ($k = 0; $k < $yl; ++$k) { // 垂直向上
                    $arr[$i][$j] = $m++;
                    $i--;
                }
                $i++;
                $j++;
                $bRight = !$bRight; // 换方向
                $xl--;// 步长调整
                $yl--;// 步长调整
            }
        }
        return $arr;
    }
}

$N = 10;
$arr = Solution::foo($N);
for ($i = 0; $i < $N; $i++) {
    ksort($arr[$i]);
    echo implode(", ", $arr[$i]) . "\r\n<br/>";
}
