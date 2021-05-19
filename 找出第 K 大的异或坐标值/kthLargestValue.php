<?php



/**
给你一个二维矩阵 matrix 和一个整数 k ，矩阵大小为 m x n 由非负整数组成。

矩阵中坐标 (a, b) 的 值 可由对所有满足 0 <= i <= a < m 且 0 <= j <= b < n 的元素 matrix[i][j]（下标从 0 开始计数）执行异或运算得到。

请你找出 matrix 的所有坐标中第 k 大的值（k 的值从 1 开始计数）。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/find-kth-largest-xor-coordinate-value
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

输入：matrix = [[5,2],[1,6]], k = 1
输出：7
解释：坐标 (0,1) 的值是 5 XOR 2 = 7 ，为最大的值。
 */

$matrix = [[5, 2], [1, 6]];
$k = 1;

var_dump(kthLargestValue($matrix, $k));
var_dump(kthLargestValue1($matrix, $k));


function kthLargestValue($matrix, $k)
{
    $row = count($matrix);
    $col = count($matrix[0]);
    $preXor = array_fill(0, $row + 1, array_fill(0, $col + 1, 0));
    $minHeap = new SplMinHeap();
    for ($i = 1; $i <= $row; $i++) {
        for ($j = 1; $j <= $col; $j++) {
            $preXor[$i][$j] = $preXor[$i - 1][$j] ^ $preXor[$i][$j - 1] ^ $preXor[$i - 1][$j - 1] ^ $matrix[$i - 1][$j - 1];
            if (count($minHeap) < $k) {
                $minHeap->insert($preXor[$i][$j]);
            } else {

                if ($preXor[$i][$j] > $minHeap->top()) {
                    $minHeap->extract();
                    $minHeap->insert($preXor[$i][$j]);
                }
            }
        }
    }

    return $minHeap->top();
}


function kthLargestValue1($matrix, $k)
{
    $temp = [];
    $arr = [];

    foreach ($matrix as $key => $val) {
        foreach ($val as $ke => $v) {
            if ($key == 0 && $ke == 0) {
                $temp[] = $arr[$key][$ke] = $v;
            } elseif ($key == 0) {
                $temp[] = $arr[$key][$ke] = $v ^ $arr[$key][$ke - 1];
            } elseif ($ke == 0) {
                $temp[] = $arr[$key][$ke] = $v ^ $arr[$key - 1][$ke];
            } else {
                $temp[] = $arr[$key][$ke] = $v ^ $arr[$key - 1][$ke] ^ $arr[$key][$ke - 1] ^ $arr[$key - 1][$ke - 1];
            }
        }
    }

    rsort($temp);

    return $temp[$k - 1];
}
